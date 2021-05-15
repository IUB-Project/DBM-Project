<html>
   <head>
      <title>Student Management | Add</title>
   </head>

   <body>
      <form action = "/create" method = "post">
         <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
         <table>
            <div class="p-4 bg-secondary">
                <input type="text" name='stud_name' class="form-control form-control-alternative" placeholder="Name">
            </div>
            <tr>
               <td>Name</td>
               <td><input type='text' name='AssessmentNo' class="form-control form-control-alternative" placeholder="Name" /></td>
            </tr>
            <tr>
               <td colspan = '2'>
                  <input type = 'submit' value = "Add student"/>
               </td>
            </tr>
         </table>
      </form>

   </body>
</html>


<div class="form-group">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
      <div class="input-group-append">
        <span class="input-group-text" id="basic-addon2">@example.com</span>
      </div>
    </div>
</div>

<div class="form-group">
    <label class="form-control-label" for="basic-url">Your vanity URL</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
      </div>
      <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
    </div>
</div>

<div class="form-group">
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text">$</span>
      </div>
      <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
      <div class="input-group-append">
        <span class="input-group-text">.00</span>
      </div>
    </div>
</div>



<div class="form-group">
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text">With textarea</span>
      </div>
      <textarea class="form-control" aria-label="With textarea"></textarea>
    </div>
</div>
