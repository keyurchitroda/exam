const express = require("express");
const app = express();
const mongoose = require("mongoose");
const User = require("./model/user");
const userroute = require("./route/user")

app.set("view engine","ejs")
app.set("views","view")

app.use(express.static('uploads'))

mongoose.connect("mongodb://localhost:27017/db1",{
    useNewUrlParser:true,
    useUnifiedTopology:true
})
mongoose.connection.on("connected",()=>{
    console.log("connection successfully...!");
})
mongoose.connection.on("error",(err)=>{
    console.log("not connected..!",err);
})

app.use(express.json())
app.use(express.urlencoded({extended:true}))

app.use("/",userroute)

app.listen(4000,()=>{
    console.log("server running on port 4000");
})
