<?php

namespace Gloudemans\Theme;

class BrandMetaBoxes
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
        add_meta_box('properties', 'Gegevens', [$this, 'renderPropertiesBox'], 'brand', 'advanced', 'high');
    }

    /**
     * Render the video meta boxes
     *
     * @param $post
     */
    public function renderPropertiesBox($post)
    {
        $website = get_post_meta($post->ID, 'website', true);
        $onfront = get_post_meta($post->ID, 'onfront', true);

        ?>
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row">
                        <label for="brand_website">Website</label>
                    </th>
                    <td>
                        <input type="text" name="brand[website]" id="brand_website" value="<?php echo $website; ?>" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="brand_onfront">Toon op voorpagina?</label>
                    </th>
                    <td>
                        <input type="checkbox" name="brand[onfront]" id="brand_onfront" value="1" <?php checked('1', $onfront);?>>
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

        if( isset($_POST['brand'])) {
            if (isset($_POST['brand']['website'])) {
                update_post_meta($post_id, 'website', $_POST['brand']['website']);
            }

            if (isset($_POST['brand']['onfront'])) {
                update_post_meta($post_id, 'onfront', $_POST['brand']['onfront']);
            }
        }
    }

}