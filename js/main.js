jQuery(function ($) {
  
  //function that posts colorbox data to the 'create-user' controller
  function submitUser() {
    //set the colorbox data to certain variables
    var username = $('.submit-user-wrapper input#first-name').val() + $('.submit-user-wrapper input#last-name').val();
    var password = username;
    var email = $('.submit-user-wrapper input#email').val();
    var phone = $('.submit-user-wrapper input#phone').val();
    //post the data and close the colorbox
    $.post(
      "/add-user?_format=json",
      { username: username, password: password, email: email, phone: phone }
    ).done(function (data) {
      $.colorbox.close();
      console.log(data);
    });
  }
  
  //Colorbox Open on Click Function.
  //Defines colorbox html content.
  //Creates allows submit user function to run on 'submit' click.
  $('.open-box').click(function(){
    $.colorbox({
      //create colorbox content
			html: '<h2>Add User</h2><div><label>First Name: </label>'
      + '<div class="submit-user-wrapper"><div><input type="text" style="display: inline; margin-left: 10px;" id="first-name" name="first-name"></div>'
      + '<div><label>Last Name:</label><input style="display: inline; margin-left: 10px;" name="last-name" id="last-name" type="text"></div>'
      + '<div><label>Email: </label><input type="text" id="email" name="email"></div>'
      + '<div><label>Phone: </label><input type="text" id="phone" name="phone"></div>'
      + '<div><input type="submit" id="submit-colorbox" value="Add"></div></div>',
			height: 500,
			width: 500,
			onComplete: function () {
        //call function to submit the entered data when the user clicks the 'add button'
        $('#submit-colorbox').click(function() {
          submitUser();
        });
			}
		});
  });
});