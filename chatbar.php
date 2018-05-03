<style type="text/css">
	/* CHAT SIDEBAR */

  @media (max-width: 1155px)
{
 .chat-sidebar {
  overflow-y: hidden;
  display: none;
  position: absolute;
}
}

		.chat-sidebar {
  margin-top: 3%;
  position: fixed;
  top: 0px;
  right: 0px;
  box-shadow: 1px 0 0 #F7F7F7 inset;
  border-left: 1px solid #ccc;
  width: 230px;
  height: 100%;
  overflow-y: hidden;
}

.sidebar-name {
  padding: 4px 16px;
  position: relative;
  cursor: pointer;
}

.sidebar-name:hover {
  background: rgba(0, 0, 0, 0.05);
  /*background-color: #ddd;*/
  padding: 4px 16px;
}

.sidebar-name:first-child {
  border-top: none;
}

.sidebar-name:last-child:after {
  content: '';
  display: block;
  position: absolute;
  bottom: -2px;
  left: 0px;
  background: rgba(255, 255, 255, 0.2);
  width: 100%;
  height: 1px;
}

/* CHATBOXES */
.chatbox-wrapper {
  width: 100%;
  height: 100%;
  overflow: scroll;
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
    position: fixed;
}

.chatbox-flex-wrapper {
  display: flex;
  justify-content: flex-end; /* Align the chatboxes to the right of the page */
  align-items: flex-end; /* Align the chatboxes to the bottom of the page */
  padding: 0px 4px;
  min-width: min-content;
  height: 100%;
    position: fixed;
    float: right;
    right: 220px;
}

.chatbox {
  order: 0; 
  flex-shrink: 0;
  margin: 0px 4px;
  flex-shrink: 0;
   background-color: #ffffff;
    border: 1px solid #b0b0b0;
    bottom: 0;
    display: inline-block;
    height: 320px;
    right: 220px;
    width: 260px;
    font-family: 'Open Sans', sans-serif;
}

.chatbox-header {
  padding: 8px 12px;
  position: relative;
  background: #27AE60;
  color: #ECF0F1;
  border-bottom: 1px rgba(0, 0, 0, 0.2) solid;
}
.chatbox-header:hover {
  cursor: pointer;
}
#alal{
  background-color: #ddd;
  height: 100px;
}
.alal{
  padding: 8px 12px;
  position: relative;
  background: #fff;
  border-bottom: 1px rgba(0, 0, 0, 0.2) solid;
  height: 80px;
  overflow-y: scroll;
}
.chatbox-close {
  float: right;
  color: rgba(0, 0, 0, 0.5);
  background: none;
  border: none;
  cursor: pointer;
}

.chatbox-close:hover {
  color: #ECF0F1;
}
/* CHATTEXTS */
.chattexts {
  background: #ECF0F1;
  overflow-y: scroll;
  height: 159px;
  overflow-x: hidden;
}


.chattext-input {
  margin-bottom: -4px;
  padding: 8px 12px;
  background: #FAFAFA;
  font-size: 12px;
  border: none;
  border-top: 1px rgba(0, 0, 0, 0.2) solid;
  width: 100%;
  resize: none;
  overflow-y: scroll;
  width: 256px;
  overflow-x: hidden;
  border: none;
        overflow: auto;
        outline: none;

        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;
  
}
#form{
  position: fixed;
  margin-top: 72px;
  margin:0px;
  padding: 0px;

}
</style>
<script type="text/javascript" src="assets/js/jquery.js"></script>
    <script>
$(document).ready(function(){
function update_user_activity()
{
 var action = 'update_time';
 var uid = '<?php echo''.$_COOKIE['uid'].'' ?>';
 $.ajax({
  url:"online.php",
  method:"POST",
  data:{
    "action":action,
    "uid" :uid
  },
  success:function(data)
  {
    $('.chat-sidebar').html(data);
  }
 });
}
update_user_activity();
setInterval(function(){ 
 update_user_activity();
}, 5000);

fetch_user_login_data();
setInterval(function(){ 
 fetch_user_login_data();
},15000);
function fetch_user_login_data()
{
 var action = "fetch_data";
 $.ajax({
  url:"online.php",
  method:"POST",
  data:{action:action},
  success:function(data)
  {
   $('.chat-sidebar').html(data);

  }
 });
}
});
</script>
<div class="chat-sidebar" id="chat">
  
</div>