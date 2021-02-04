const express = require("express")
const router = express.Router();
const User = require("../model/user")
const multer = require("multer");

// var storage = multer.diskStorage({
//     destination: function (req, file, cb) {
//       cb(null, 'uploads/')
//     },
//     filename: function(req, file, cb) {
//       cb(null, Date.now() + file.originalname)
//     }
//   })


//var upload = multer({storage:storage})
var upload=multer({dest:"uploads/"});

router.get("/",(req,res)=>{
   User.find((err,data)=>{
       if(!err)
       {
           res.render("index",{user1:data})
       }
   })
})

router.post("/insert",upload.single('image') ,(req,res)=>{
    const {firstname,lastname,email,age} = req.body;

    const image = req.file.filename;


    const user = new User({
        firstname,
        lastname,
        email,
        age,
        image
    })
    user.save().then((err,data)=>{
        if(!err)
        {
            console.log("successfully..inserted..")
        }
        else{
            res.redirect("/");
        }
    })
})

router.get("/deleteuser/:id",(req,res)=>{
    User.findByIdAndDelete({_id:req.params.id},(err)=>{
        if(!err)
        {
           res.redirect("/")
        }   
    })
})

router.get("/findById/:id",(req,res)=>{
    User.findOneAndUpdate({_id:req.params.id},req.body,{new:true},(err,data)=>{
        if(!err){
            res.render("edit",{user2:data})
        }
    })
})

router.post("/edit/:id",(req,res)=>{

    User.findByIdAndUpdate({_id:req.params.id},req.body,(err)=>{
        if(!err)
        {
            res.redirect("/")
        }
    })
})

module.exports = router