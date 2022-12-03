
        const form=document.getElementById("reviewform");
        var comments=[];

              
        function loadComments2(comm)
        {
            temp=document.getElementById("Review");
            
            
        
        if(document.getElementById("Nocomments").style.display=="none"&&comm==null)
        {
            document.getElementById("Nocomments").style.display="block";
        }else{
        document.getElementById("Nocomments").style.display="none";
            
       
        
        newComment=document.createElement("li");
        newComment.innerText=comm.Comment;
        CommentData=document.createElement("div");
        CommentData.innerText=comm.Name+" posted on "+comm.DatePosted;
        newComment.appendChild(CommentData);
        
        temp.appendChild(newComment);
            
        
        }
        }
        
        function addReview(){
        document.querySelector("#container").style.display="none";
        document.querySelector("#newRating").style.display="block";
        }
        
document.getElementById("cancelcomment").addEventListener('click',(e)=>{
    
    
        e.preventDefault();
        confirmReset=confirm("Are you sure you want to Cancel?");

        
        if(confirmReset==true)
        {
            form.reset();
            document.querySelector("#container").style.display="block";
        document.querySelector("#newRating").style.display="none";
        }
    })
       

           

            
           

           


