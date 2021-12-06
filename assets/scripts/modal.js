function createModal(status, destination,title_content,paragraph_content ){
      // let modalDiv=document.getElementById('id01'); 

     

      let modalDiv=document.createElement('div'); 
          modalDiv.setAttribute('id','id01'); 
          modalDiv.setAttribute('class','modal');
      let modalSpan=document.createElement('span'); 
          modalSpan.setAttribute('class','close');
          modalSpan.setAttribute('title','Close Modal');
          modalSpan.innerHTML='&times;';
          modalSpan.onclick=function() {document.getElementById('id01').remove(); };

      let modalContent=document.createElement('div'); 
          modalContent.setAttribute('class','modal-content'); 
      let modalContainer=document.createElement('div'); 
          modalContainer.setAttribute('class','container'); 
     
      let title=document.createElement('h1'); 
          title.innerHTML=title_content;
      // let paragraph=document.createElement('p'); 
      //     paragraph.innerHTML=paragraph_content; 
      let modalButtons=document.createElement('div'); 
          modalButtons.setAttribute('class','clearfix'); 
      let cancelButton=document.createElement('button'); 
          cancelButton.setAttribute('class','cancelbtn'); 
          cancelButton.innerHTML='لا'; 
          cancelButton.onclick=function(){document.getElementById('id01').remove();}
          // status='success'; 
          if(status==='approval'){
            var statusButton=document.createElement('button'); 
                statusButton.setAttribute('class',' success'); 
                statusButton.innerHTML='موافق'; 
    
          }
          else if(status==='warning'){
            var statusButton=document.createElement('button'); 
                statusButton.setAttribute('class',' alert'); 
                statusButton.innerHTML='حذف'; 
                if(destination){
                  statusButton.onclick=function() {window.location.href=destination; };
                }                        
          }
          else if(status==='success'){
            var statusButton=document.createElement('i'); 
                // statusButton.setAttribute('class','fas fa-check-circle fa-5x  green-check'); 
                statusButton.setAttribute('class','fas fa-times-circle fa-5x  red-cross'); 
                statusButton.innerHTML=''; 
                if(destination){
                  statusButton.onclick=function() {window.location.href=destination; };
                }                        
          }
          else if(status==='refund'){
            cancelButton=document.createElement('button'); 
            cancelButton.setAttribute('class','cancelbtn'); 
            cancelButton.innerHTML='تراجع'; 
            cancelButton.onclick=function(){document.getElementById('id01').remove();}

            var statusButton=document.createElement('button'); 
                statusButton.setAttribute('class',' success'); 
                statusButton.innerHTML='تاكيد'; 
                statusButton.id="approve_refund_form";
                statusButton.target=destination;
                // statusButton.formTarget='_blank'; 
                // statusButton.type='submit'; 
                if(destination){
                  statusButton.onclick=function() {document.getElementById('refund_data').submit();  };
                } 
              
          }
          
      modalDiv.appendChild(modalSpan);
      modalDiv.appendChild(modalContent);
      modalContent.appendChild(modalContainer);
      modalContainer.appendChild(title);
      modalContainer.appendChild(paragraph_content);
      paragraph_content.appendChild(modalButtons);
      modalButtons.appendChild(cancelButton);   
      modalButtons.appendChild(statusButton);            
      document.body.appendChild(modalDiv);

      var modal = document.getElementById("id01");    
      // // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target === modal) {
          document.getElementById('id01').remove();
        }
      } 
    }
  


    function verify_approval(e){
      let title_content='انشاء صنف'; 
      let paragraph_content=' هل تريد انشاء :'+'فلتر بنزين';
      let destination= e.target.href;
      e.preventDefault();
      createModal('approval',destination,title_content,paragraph_content);
      document.getElementById('id01').style.display='block';
   

      return; 
    }
    function verify_warning(e){
      let    title_content='تحذير!'; 
      let paragraph_content='هل تريد حذف:';

      let destination= e.target.href;
      e.preventDefault();
      createModal('warning',destination,title_content,paragraph_content);
      document.getElementById('id01').style.display='block';
   

      return; 
    }


 