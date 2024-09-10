const express = require("express");
const http = require("http");
const socketIo = require("socket.io");
const cors = require("cors");
const axios = require("axios");

const fs = require("fs"); // Required to read private key and certificate files
// Define the port and host
const PORT = 3000;
const HOST = "http://127.0.0.1";

const app = express();
// Use CORS middleware
app.use(
    cors({
        origin: "http://127.0.0.1:8000", // Change this to your frontend URL
        methods: ["GET", "POST"],
    })
);

// Read private key and certificate files
const privateKey = fs.readFileSync('./private.key');
const certificate = fs.readFileSync('./certificate.crt');
const options  = { key: privateKey, cert: certificate };

const server = http.createServer(app);
const io = socketIo(server);

// Serve a simple message at the root URL
app.get("/", (req, res) => {
    res.send("Welcome to the Socket.IO server");
});


io.on("connection", (socket) => {
    console.log(`a user connected ${socket.id}`);

    socket.on("join room", (roomId) => {
        socket.join(roomId);

        const rooms = getAllRooms();
        console.log(rooms);
    });

    socket.on("leave room", (roomId) => {
        socket.leave(roomId);
        const rooms = getAllRooms();
        console.log("Current rooms:", rooms);
    });

    socket.on("start typing", (roomId) => {
        socket.to(roomId).emit("start typing", "typing....");
    });

    socket.on("stop typing", (roomId) => {
        socket.to(roomId).emit("stop typing", "");
    });

    socket.on("status updated", async () => {
        try {
            const response = await axios.get(
                "http://127.0.0.1:8000/api/get-socket-id",
                {
                    params: {
                        socketId: socket.id,
                    },  
                }
            );
            // Emit event to specific socket IDs
            console.log(response.data);
            response.data.forEach((id) => {
                io.to(id).emit("status updated", "updated");
            });
        } catch (error) {
            console.error("Error updating status:", error);
        }
        // io.except(socket.id).emit("status updated", "updated");
    });

    socket.on("chat message",async (msg) => {
        // console.log(msg.room_id);
        // console.log(`message: ${msg.message.message} in room: ${msg.room_id}`);
        // io.emit("chat message", msg);
        io.to(msg.room_id).emit("chat message", msg);
        const roomSockets = getUsersInRoom(msg.room_id, msg.socket_id);
        if (roomSockets == false) {
            io.to(msg.socket_id).emit("chat message update", msg);
            try {
                const response = await axios.post(
                    "http://127.0.0.1:8000/api/send-notification",
                    {
                        socketId: socket.id,
                        data: msg,
                    }
                );
                console.log(response);
            } catch (error) {
                console.error("Error updating status:", error);
            }
        }
    });

    socket.on("update thread list", (socketId) => {
        console.log(socketId);
        io.to(socketId).emit("update thread list", socketId);
    });

    socket.on("call-user", (data) => {
        console.log(data);
        io.to(data.socketId).emit("incoming-call", data);
    });
    socket.on("call-started", (data) => {
        console.log(data);
        socket.to(data.roomId).emit("call-started", data);
    });

    socket.on("call-ended", (data) => {
        console.log(data);
        io.to(data.socketId).to(data.fromSocketId).emit("call-ends", data);
    });
    
    socket.on("call-declined", (data) => {
        console.log('call-declined');
        console.log(data);
        io.to(data.socketId).emit("call-declined", data);
    });


     socket.on("disconnect", async() => {
        console.log(socket.id);
        io.emit("stop typing", socket.id);
        io.to(socket.id).emit("socket disconnect", "disconnected");
        try {
            const response = await axios.post('http://127.0.0.1:8000/api/update-status', {
                socketId: socket.id,
                status: 'offline'
            });
            console.log('Status updated successfully:', response.data);
        } catch (error) {
            console.error('Error updating status:', error);
        }
    });

    const getUsersInRoom = (room,socketId) => {
        const roomSockets = io.sockets.adapter.rooms.get(room);
        if (roomSockets) {
            return roomSockets.has(socketId);
        } else {
            return false;
        }
    };

    function getAllRooms() {
        const rooms = [];
        io.sockets.adapter.rooms.forEach((value, key) => {
            // Exclude default socket rooms
            if (!io.sockets.sockets.get(key)) {
                rooms.push({ roomId: key, userCount: value.size });
            }
        });
        return rooms;
    }
});

// server.listen(PORT, HOST, () => {
//     console.log(`Server running at http://${HOST}:${PORT}/`);
// });
server.listen(PORT, () => {
    console.log("Socket.IO server running on port 3000");
});
