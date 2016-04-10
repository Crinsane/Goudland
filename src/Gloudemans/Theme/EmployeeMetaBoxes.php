<?php

namespace Gloudemans\Theme;

class EmployeeMetaBoxes
{

    /**
     * Add meta boxes
     */
    public function __construct()
    {
        add_action('add_meta_boxes', [$this, 'addPropertiesBox']);
        add_action('save_post', [$this, 'saveMeta']);
    }

    /**
     * Add the properties meta boxes
     */
    public function addPropertiesBox()
    {
        add_meta_box('properties', 'Gegevens', [$this, 'renderPropertiesBox'], 'employee', 'advanced', 'high');
    }

    /**
     * Render the video meta boxes
     *
     * @param $post
     */
    public function renderPropertiesBox($post)
    {
        $function = get_post_meta($post->ID, 'function', true);
        $phone = get_post_meta($post->ID, 'phone', true);
        $mobile = get_post_meta($post->ID, 'mobile', true);
        $email = get_post_meta($post->ID, 'email', true);

        ?>
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row">
                        <label for="employee_function">Functie</label>
                    </th>
                    <td>
                        <input type="text" name="employee[function]" id="employee_function" value="<?php echo $function; ?>" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="employee_phone">Telefoon</label>
                    </th>
                    <td>
                        <input type="text" name="employee[phone]" id="employee_phone" value="<?php echo $phone; ?>" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="employee_mobile">Mobiel</label>
                    </th>
                    <td>
                        <input type="text" name="employee[mobile]" id="employee_mobile" value="<?php echo $mobile; ?>" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="employee_mail">E-mail</label>
                    </th>
                    <td>
                        <input type="text" name="employee[email]" id="employee_mail" value="<?php echo $email; ?>" class="regular-text">
                    </td>
                </tr>
            </tbody>
        </table>
        <?php
    }

    /**
     * Save the post meta
     *
     * @param $post_id
     */
    public function saveMeta($post_id)
    {
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        if( isset($_POST['employee'])) {
            if (isset($_POST['employee']['function'])) {
                update_post_meta($post_id, 'function', $_POST['employee']['function']);
            }

            if (isset($_POST['employee']['phone'])) {
                update_post_meta($post_id, 'phone', $_POST['employee']['phone']);
            }

            if (isset($_POST['employee']['mobile'])) {
                update_post_meta($post_id, 'mobile', $_POST['employee']['mobile']);
            }

            if (isset($_POST['employee']['email'])) {
                update_post_meta($post_id, 'email', $_POST['employee']['email']);
            }
        }
    }

}