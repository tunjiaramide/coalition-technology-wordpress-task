<?php


class CTThemeSettings {
    function __construct(){
        add_action( 'admin_menu', array($this, 'adminMenu') );
    }

    function adminMenu() {
        add_menu_page( 'CT Theme Settings', 'CT Theme Settings', 'manage_options', 'ctthemesettings', array($this, 'settingsPage'), 'dashicons-admin-settings', 50 );
    }

    function handleForm(){
        if (isset($_POST['ourNonce']) && wp_verify_nonce($_POST['ourNonce'], 'settingspage') && current_user_can('manage_options')) {
            // Sanitize and handle logo upload
            if(isset($_FILES['logo_upload']) && !empty($_FILES['logo_upload']['name'])) {
                $upload_overrides = array('test_form' => false);
                $movefile = wp_handle_upload($_FILES['logo_upload'], $upload_overrides);
    
                if ($movefile && !isset($movefile['error'])) {
                    // File uploaded successfully, save its path or URL to the database
                    update_option('logo_upload', $movefile['url']); // You might want to save the URL or file path depending on your needs
                } else {
                    // Error handling if file upload fails
                    echo "Logo upload failed: " . $movefile['error'];
                }
            }
    
            // Sanitize and save other options
            $phone_number = isset($_POST['phone_number']) ? sanitize_text_field($_POST['phone_number']) : '';
            update_option('phone_number', $phone_number);
    
            $address = isset($_POST['address']) ? sanitize_text_field($_POST['address']) : '';
            update_option('address', $address);
    
            $fax = isset($_POST['fax']) ? $_POST['fax'] : '';
            update_option('fax', $fax);
    
            $facebook = isset($_POST['facebook']) ? $_POST['facebook'] : '';
            update_option('facebook', $facebook);
    
            $twitter = isset($_POST['twitter']) ? $_POST['twitter'] : '';
            update_option('twitter', $twitter);
    
            $linkedin = isset($_POST['linkedin']) ? $_POST['linkedin'] : '';
            update_option('linkedin', $linkedin);
    
            $pinterest = isset($_POST['pinterest']) ? $_POST['pinterest'] : '';
            update_option('pinterest', $pinterest);
    
            ?>
            <div>
                <p>Congrats, theme settings have been updated.</p>
            </div>
            <?php
        } else {
            ?>
            <div>
                <p>Sorry, you do not have permission to update the theme.</p>
            </div>
            <?php
        }
    }
    

    function settingsPage(){ ?>
        <div>
            <h1>Theme settings page</h1>
            <?php if (isset($_POST['submitted']) && $_POST['submitted'] == "true") $this->handleForm(); ?>

            <form method="POST" enctype="multipart/form-data"> 
                <input type="hidden" name="submitted" value="true" />
                <?php wp_nonce_field('settingspage', 'ourNonce') ?>

                <div>
                    <label for="logo_upload">Upload Logo</label>
                    <input type="file" name="logo_upload" accept="image/png, image/jpg, image/jpeg" required />
                </div>

                <div>
                    <label for="phone_number">Phone Number:</label>
                    <input type="number" name="phone_number" required />
                </div>

                <div>
                    <label for="address">Address Information:</label>
                    <input type="text" name="address" required />
                </div>
                <div>
                    <label for="fax">Fax Number:</label>
                    <input type="number" name="fax" required />
                </div>
                <div>
                    <label for="facebook">Facebook:</label>
                    <input type="text" name="facebook" />
                    <label for="twitter">Twitter:</label>
                    <input type="text" name="twitter"/>
                    <label for="linkedin">LinkedIn:</label>
                    <input type="text" name="linkedin" />
                    <label for="pininterest">Pinterest:</label>
                    <input type="text" name="pinterest" />
                </div>

                <input type="submit" name="submit" id="submit" value="Update Content">
            </form>
        </div> 

   <?php }
}


$ctThemeSettings = new CTThemeSettings();