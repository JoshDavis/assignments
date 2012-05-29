<?php

require_once 'includes/form-processor.php';

?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Form</title>
    <link href="css/general.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Black+Ops+One' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>
</head>

<body>
<?php if ($completed) : ?>
<strong>Thanks for giving us some feedback!</strong>
<?php else : ?>

<h1>Give us some Feedback!</h1>

	<form method="post" action="index.php">
    	<div>
        	<label for="name">Name <?php if (isset($errors['name'])) : ?><strong class="error">id required*</strong><?php endif; ?></label>
            <input id="name" name="name" required value="<?php echo $name; ?>">
        </div>
        
        <div>
        	<label for="email">E-mail Address <?php if (isset($errors['email'])) : ?><strong class="error">e-mail required*</strong><?php endif; ?></label>
            <input type="email" id="email" name="email" required value="<?php echo $email; ?>">
        </div>
		
		<div>
        	<label for="username">Username <?php if (isset($errors['username'])) : ?><strong class="error">must be less than 25 characters*</strong><?php endif; ?></label>
            <input type="username" id="username" name="username" required value="<?php echo $username; ?>">
        </div>
		
		<div>
			<label for="password">Password:</label>
			<input id="password" name="password" type="password" value="<?php echo $password; ?>" required><?php if (isset($errors['password']) ) :?><strong class="error"> Password</strong><?php endif; ?>
		</div>
		
		
        
        <fieldset>
        	
            <legend>Preferred Language:</legend>
            <?php if (isset($errors['preferredlang'])) : ?><strong>Language:</strong><?php endif; ?>
            <input type="radio" id="english" name="preferredlang" value="e"<?php if ($preferredlang == 'e') { 
				echo ' checked'; } 
			?>>
            <label for="english">English</label>
        	
            <input type="radio" id="french" name="preferredlang" value="f"<?php if ($preferredlang == 'f') {
				echo 'checked';
			}?>>
            <label for="french">French</label>
            
            <input type="radio" id="spanish" name="preferredlang" value="s"<?php if ($preferredlang == 's') {
				echo 'checked';
			}?>>
            <label for="spanish">Spanish</label>
            
		</fieldset>
      
	    <div>
        	<label for="notes">Notes<?php if (isset($errors['notes'])) : ?><strong class="error">must be between 1 and 100 characters*</strong><?php endif; ?></label>
            <textarea id="notes" name="notes"><?php echo $notes; ?></textarea>
            <p>Your message must be between 1 and 100 characters long.</p>
        </div>
        
        <div>
        	<input type="checkbox" id="terms" name="terms" value="1">
            <label for="terms">Accept Terms?<?php if (isset($errors['terms'])) : ?><strong class="error">you forgot to accept*</strong><?php endif; ?></label>
            
        	
        </div>
        
        
        
        
        <button type="submit">Submit</button>
    
    
    
    </form>
    <?php endif; ?>


</body>
</html>