<?php

//Content on Single Product
function spb_display_custom_fields_product_data()
{
    global $post; ?>
    <div id="bundle_servizitrepuntozero" class="panel woocommerce_options_panel" name="bundle_servizitrepuntozero">
    <div class="options_group">
    <?php
        $all_ids = get_posts(array(
            'post_type' => 'product',
            'numberposts' => -1,
            'post_status' => 'publish',
            'fields' => 'ids',
        ));
        $selected_ids_bundle = get_post_meta($post->ID, 'select_products_bundle', true);
    ?>
    <form name="save_bundle_product_page" action="" method="post">
        <?php
            woocommerce_wp_checkbox(array(
                'id' => 'activate_bundle_checkbox',
                'label' => esc_html__('Activate Bundle', 'bundle-servizitrepuntozero-domain'),
            ));

            woocommerce_wp_text_input(array(
                'id' => 'bundle_title_text',
                'label' => esc_html__('Bundle Title', 'bundle-servizitrepuntozero-domain'),
                'placeholder' => esc_html__('Enter the title of the Bundle', 'bundle-servizitrepuntozero-domain'),
                'type' => 'text',
                'desc_tip' => true,
                'description' => esc_html__('Suggest a dedicated promotion or promote related products', 'bundle-servizitrepuntozero-domain'),
            ));

            woocommerce_wp_checkbox(array(
                'id' => 'activate_discount_bundle_checkbox',
                'label' => esc_html__('Activate Discount', 'bundle-servizitrepuntozero-domain'),
            ));

            woocommerce_wp_text_input(array(
                'id' => 'discount_number_bundle',
                'label' => esc_html__('Percentage discount', 'bundle-servizitrepuntozero-domain'),
                'placeholder' => esc_html__('Enter the percentage to apply', 'bundle-servizitrepuntozero-domain'),
                'type' => 'number',
                'desc_tip' => true,
                'description' => esc_html__('Activate a precentage discount on the total number of products included in the Bundle', 'bundle-servizitrepuntozero-domain'),
            ));
        ?>
        <p class='form-field select_products_bundle'>
            <label for='select_products_bundle'><?= esc_html_e('Enter the products', 'bundle-servizitrepuntozero-domain'); ?></label>
            <select id="select_products_bundle" multiple="multiple" name='select_products_bundle[]' class='wc-enhanced-select' style='width: 80%;'>
                <?php foreach ($all_ids as $id_bundle)
                { ?>
                    <option value="<?php echo esc_attr($id_bundle); ?>" <?php echo esc_attr(!empty($selected_ids_bundle) && in_array($id_bundle, $selected_ids_bundle) ? 'selected' : '') ?>>
                        <?php $title_prod_bundle = wc_get_product($id_bundle);
                        $post_status_product_bundle = get_post_status($title_prod_bundle);
                        if ($post_status_product_bundle == "publish")
                        {
                            echo esc_html($title_prod_bundle->get_title());
                        } ?>
                    </option>
                <?php
                } ?>
            </select>
        </p>
        <div class="show_text_out_of_stock_bundle_products" style="display: flex; flex-direction: row;">
            <input type="submit" name="save_bundle_products_servizi" id="save_bundle_products_servizi" class="button button-primary" style="margin-bottom: 10px; margin-left: 10px" value="<?php _e('Update Bundle', 'bundle-servizitrepuntozero-domain'); ?>">
            <?php if (isset($selected_ids_bundle) && !empty($selected_ids_bundle))
            {
                foreach ($selected_ids_bundle as $selected_ids_bundles)
                {
                    $select_stock_status = wc_get_product($selected_ids_bundles);
                    if ($select_stock_status->get_stock_status() == "outofstock")
                    {
                        $link_select_stock_status = get_permalink($select_stock_status->get_id()); ?>
                        <span class="show_text_out_of_stock_bundle" style="margin-top: 15px; margin-left: 35px; font-size: 15px;">
                            <b style="color: red;"><?= esc_html_e('Attention! ', 'bundle-servizitrepuntozero-domain'); ?></b>
                            <?= esc_html_e('The product: ', 'bundle-servizitrepuntozero-domain'); ?>
                            <a href="<?= esc_url($link_select_stock_status); ?>"><?= esc_html($select_stock_status->get_title()); ?></a>
                            <strong><?= esc_html_e('is out of stock.', 'bundle-servizitrepuntozero-domain'); ?></strong><br/>
                            <?= esc_html_e('The bundle will not be visible on the product page, please remove the &#10004; on the checkbox ', 'bundle-servizitrepuntozero-domain'); ?>
                            <i><?= esc_html_e('"Activate Bundle" ', 'bundle-servizitrepuntozero-domain'); ?></i>
                            <?= esc_html_e('or create a new offer.', 'bundle-servizitrepuntozero-domain'); ?>
                        </span>
                        <?php
                        $cont .= count(explode('-', $select_stock_status->get_id()));
                        if ($cont > 1)
                        {
                            ?>
                            <style>
                                .show_text_out_of_stock_bundle_products {
                                    flex-direction: column !important;
                                }

                                #save_bundle_products_servizi {
                                    width: fit-content !important;
                                }

                                span.show_text_out_of_stock_bundle {
                                    margin-left: 12px !important;
                                    margin-bottom: 15px !important;
                                }
                            </style>
                        <?php
                        } else
                        { ?>
                            <style>
                                .show_text_out_of_stock_bundle_products {
                                    flex-direction: row !important;
                                }

                                span.show_text_out_of_stock_bundle {
                                    margin-top: 0 !important;
                                }
                            </style>
                        <?php
                        }
                    }
                }
            }
            ?>
        </div>
    </form>
    </div>
    </div>
    <?php
}
add_filter('woocommerce_product_data_panels', 'spb_display_custom_fields_product_data');

//Whole content of Bundle displayed on the Content Single Product Page
function spb_display_on_content_single_product_page()
{
    global $post;
    $bundle_title_text = get_post_meta($post->ID, 'bundle_title_text', true);
    $select_products_bundle = get_post_meta($post->ID, 'select_products_bundle', true);
    $activate_bundle_checkbox = get_post_meta($post->ID, 'activate_bundle_checkbox', true);
    $discount_number_bundle = get_post_meta($post->ID, 'discount_number_bundle', true);
    $activate_discount_bundle_checkbox = get_post_meta($post->ID, 'activate_discount_bundle_checkbox', true);
    if (isset($select_products_bundle) && !empty($select_products_bundle))
    {
        foreach ($select_products_bundle as $select_products_bundles)
        {
            $output_bundle = wc_get_product($select_products_bundles);
            if ($output_bundle->get_stock_status() == "outofstock")
            { ?>
                <script type="text/javascript">
                    jQuery('#show_bundle_related_products').css('display', 'none');
                </script>
            <?php
            }
        }
    }
    if ($activate_bundle_checkbox == "yes")
    { ?>
        <!-- Nuova Gallery DESKTOP-->
        <div class="show_bundle" id="show_bundle_related_products" style="width: auto; border: 2px solid; border-radius: 4px; border-color: #b7b7b7; border-collapse: separate; padding: 10px; margin-bottom: 30px;">
            <?php if (empty($bundle_title_text))
            {
                ?>
                <div class="text_bundle_title">
                    <h3 class="title_bundle_default_products_h3" style="font-size: 20px; color: black; margin-top: 10px; margin-bottom: 15px;">
                        <strong><?php echo esc_html_e('You might find interesting this offer', 'bundle-servizitrepuntozero-domain'); ?></strong>
                    </h3>
                </div>
            <?php
            }
            ?>
            <div class="text_bundle_default_title">
                <h3 class="title_bundle_products_h3" style="font-size: 20px; color: black; margin-top: 10px; margin-bottom: 15px;">
                    <strong><?php echo esc_html($bundle_title_text); ?></strong>
                </h3>
            </div>
            <table class="bundle_show_related_products" style="width: 100%;">
                <tbody class="bundle_show_related_products_tbody" style="display: flex; flex-direction: row; justify-content: flex-start;">
                <?php
                $total = 0;
                for ($i = 0; $i < count($select_products_bundle); $i++)
                {
                    $output_bundle = wc_get_product($select_products_bundle[$i]);
                    $link = get_permalink($output_bundle->get_id());
                    $prices_bundle = $output_bundle->get_price();
                    $out = $output_bundle->get_id();
                    $id_images = $output_bundle->get_image_id();
                    $total += $prices_bundle;
                    ?>
                    <tr class="bundle_bundle_image">
                        <td class="bundle_image_single" style="border-bottom: 0;">
                            <div class="show_single_bundle_images_inline">
                                <a class="link_bundle_single_image" href="<?php echo esc_url($link); ?>" style="text-decoration: none;">
                                    <img class="img_bundle_servizitrepuntozero" style="width: auto; height: 140px;" src="<?php echo esc_url(wp_get_attachment_url($id_images)); ?>">
                                </a>
                            </div>
                        </td>
                        <?php if ($i < count($select_products_bundle) - 1)
                        { ?>
                            <td class="image_plus" style="font-size: 22px; color: black; padding: 0.5rem; border-bottom: 0;">+</td>
                        <?php
                        } else
                        {
                            ?>
                            <td class="image_equal"
                                style="font-size: 22px; color: black; padding: 0.5rem; border-bottom: 0;">=
                            </td>
                        <?php } ?>
                    </tr>
                <?php
                }
                ?>
                <tr class="bundle_image_tot">
                    <td class="bundle_image_single_tot" style="border-bottom: 0;">
                        <form class="add_to_cart_selected_products_bundle" name="add_to_cart_selected_products_bundle" method="post" enctype="multipart/form-data" style="width: fit-content;">
                            <div class="total_products_cost_bundle" style="width: 100%; display: flex; flex-direction: column; align-items: center; padding: 10px; text-align: center;">
                                <?php if ($activate_discount_bundle_checkbox == "yes")
                                {
                                    $var = get_post_meta($post->ID, 'select_products_bundle', true); ?>
                                    <span class="title_total_price_bundle" style="color: black; font-size: 16px; font-weight: 900;">
                                        <strong><?= esc_html_e('Products Total', 'bundle-servizitrepuntozero-domain'); ?></strong>
                                    </span>
                                    <span class="total_price_bundle" style="padding-bottom: 20px; font-size: 16px; font-weight: 600;">
                                        <strong class="bundle_price_total_of_products_full">
                                            <s class="bundle_slashed_full_price" style="font-size: 14px; color: red;"><?php echo wc_price(esc_html($total)); ?></s>
                                        </strong>&nbsp; &nbsp;
                                        <strong class="bundle_price_total_of_products_discounted" style="font-size: 16px; color: black;">
                                            <?php $tot_discount = ($total * $discount_number_bundle) / 100;
                                            $discount_total = $total - $tot_discount;
                                            echo wc_price(esc_html(round($discount_total, 1, PHP_ROUND_HALF_UP))); ?></strong>
                                    </span>
                                    <button type="submit" name="add_to_cart_bundle" class="btn btn-success bundle_button_servizi" style="width: max-content;" data-prod-id="<?= esc_attr(implode(',', $var)); ?>" data-discount="<?= esc_attr(get_post_meta($post->ID, 'discount_number_bundle', true)); ?>" data-check="<?= esc_attr(get_post_meta($post->ID, 'activate_discount_bundle_checkbox', true)); ?>">
                                        <?= esc_html_e('Buy this offer', 'bundle-servizitrepuntozero-domain'); ?>
                                    </button>
                                <?php
                                } else
                                {
                                    $var = get_post_meta($post->ID, 'select_products_bundle', true);
                                    ?>
                                        <span class="title_total_price_bundle" style="color: black; font-size: 16px; font-weight: 900;">
                                            <strong>
                                                <?= esc_html_e('Products Total', 'bundle-servizitrepuntozero-domain'); ?>
                                            </strong>
                                        </span>
                                        <span class="total_price_bundle" style="padding-bottom: 20px; font-size: 16px; font-weight: 600; color: black;">
                                            <strong class="bundle_price_total_of_products_full"><?php echo wc_price(esc_html($total)); ?></strong>
                                        </span>
                                        <button type="submit" name="add_to_cart_bundle" class="btn btn-success bundle_button_servizi" style="width: max-content;" data-prod-id="<?= esc_attr(implode(',', $var)); ?>" data-check="<?= esc_attr(get_post_meta($post->ID, 'activate_discount_bundle_checkbox', true)); ?>">
                                            <?php echo esc_html_e('Buy this offer', 'bundle-servizitrepuntozero-domain'); ?>
                                        </button>
                                    <?php
                                }
                                ?>
                            </div>
                        </form>
                    </td>
                </tr>
                </tbody>
                <tbody class="second_bundle_show_related_products">
                <?php
                    $total = 0;
                    for ($i = 0; $i < count($select_products_bundle); $i++)
                    {
                        $output_bundle = wc_get_product($select_products_bundle[$i]);
                        $link = get_permalink($output_bundle->get_id());
                        $prices_bundle = $output_bundle->get_price();
                        $out = $output_bundle->get_id();
                        $total += $prices_bundle;
                        ?>
                        <tr class="show_text_name_bundle_images">
                            <td class="bundle_name_images_single" style="padding-top: 0 !important; padding-bottom: 10px !important; border-bottom: 0!important; text-align: left !important;">
                                <li class="name_bundle_show_text" style="color: #5a5a5a;">
                                    <a class="link_bundle_single_image_title" href="<?php echo esc_url($link); ?>" style="text-decoration: none; color: #5a5a5a;">
                                        <strong class="bundle_single_text_title" style="font-size: 15px;"><?= esc_html($output_bundle->get_title()); ?></strong>
                                    </a>
                                    <?php if ($activate_discount_bundle_checkbox == "yes")
                                    {
                                        ?>
                                        <span class="price_discounted_bundle" style="float: right; font-size: 16px; font-weight: 600;">
                                            <strong>
                                                <s class="discount_price_single" style="font-size: 14px; color: red;"><?php echo wc_price(esc_html($prices_bundle)); ?></s>
                                            </strong>&nbsp;
                                            <strong class="full_price_single" style="font-size: 16px; color: black;">
                                                <?php $tot_disc = ($prices_bundle * $discount_number_bundle) / 100;
                                                $discount_single = $prices_bundle - $tot_disc;
                                                echo wc_price(esc_html(round($discount_single, 1, PHP_ROUND_HALF_UP))); ?>
                                            </strong>
                                        </span>
                                    <?php
                                    } else
                                    { ?>
                                    <span class="full_price_bundle" style="font-size: 16px; font-weight: 600; float: right !important;">
                                        <strong class="full_price_single" style="color: black;">
                                            <?php echo wc_price(esc_html($prices_bundle)); ?>
                                        </strong>
                                    </span>
                                </li>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Nuova Gallery MOBILE -->
        <div class="show_bundle_mobile" id="show_bundle_related_products_mobile" style="display: none; width: auto; border: 2px solid; border-color: #b7b7b7; border-radius: 4px; border-collapse: separate; padding: 10px; margin-bottom: 30px;">
            <div class="text_bundle_default_title_mobile">
                <h3 style="text-align: center; font-size: 20px; color: black; margin-top: 10px; margin-bottom: 15px;">
                    <strong><?= (empty($bundle_title_text)) ? esc_html_e('You might find interesting this offer', 'bundle-servizitrepuntozero-domain') : esc_html($bundle_title_text) ; ?></strong>
                </h3>
            </div>

            <table class="bundle_show_related_products_mobile" style="width: 100%;">
                <tbody class="bundle_show_related_products_tbody_mobile" style="display: flex; flex-direction: row; justify-content: center;">
                <?php
                    $total = 0;
                    for ($i = 0; $i < count($select_products_bundle); $i++) {
                        $output_bundle = wc_get_product($select_products_bundle[$i]);
                        $link = get_permalink($output_bundle->get_id());
                        $prices_bundle = $output_bundle->get_price();
                        $out = $output_bundle->get_id();
                        $id_images = $output_bundle->get_image_id();
                        $total += $prices_bundle;
                        ?>
                        <tr class="bundle_bundle_image_mobile">
                            <td class="bundle_image_single_mobile" style="border-bottom: 0;">
                                <div class="show_single_bundle_images_inline_mobile">
                                    <a class="link_bundle_single_image_mobile" href="<?php echo esc_url($link); ?>" style="text-decoration: none;">
                                        <img class="img_bundle_servizitrepuntozero" style="width: auto; height: 140px;" src="<?php echo esc_url(wp_get_attachment_url($id_images)); ?>">
                                    </a>
                                </div>
                            </td>
                            <?php if ($i < count($select_products_bundle) - 1)
                            {
                                ?>
                                <td class="image_plus_mobile" style="font-size: 22px; color: black; padding: 0.5rem; border-bottom: 0;">+</td>
                            <?php
                            }
                            ?>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
                <tbody class="second_bundle_show_related_products_mobile">
                    <tr class="bundle_bundle_image_tot_mobile" style="display: flex; flex-direction: column; align-items: center;">
                        <td class="bundle_image_single_tot_mobile" style="border-bottom: 0;">
                            <form class="add_to_cart_selected_products_bundle" name="add_to_cart_selected_products_bundle" method="post" enctype="multipart/form-data" style="width: fit-content;">
                                <div class="total_products_cost_bundle_mobile" style="width: 100%; display: flex; flex-direction: column; align-items: center; padding: 10px;">
                                    <?php if ($activate_discount_bundle_checkbox == "yes")
                                    {
                                        $var = get_post_meta($post->ID, 'select_products_bundle', true); ?>
                                        <span class="title_total_price_bundle_mobile" style="color: black; font-size: 16px; font-weight: 900;">
                                            <strong> <?= esc_html_e('Products Total', 'bundle-servizitrepuntozero-domain'); ?></strong>
                                        </span>
                                        <span class="total_price_bundle_mobile" style="padding-bottom: 20px; font-size: 16px; font-weight: 600;">
                                            <strong class="bundle_price_total_of_products_full_mobile">
                                                <s class="bundle_slashed_full_price_mobile" style="font-size: 14px; color: red;"><?= wc_price(esc_html($total)); ?></s>
                                            </strong>
                                            <strong class="bundle_price_total_of_products_discounted" style="font-size: 16px; color: black;">
                                                <?php $tot_discount = ($total * $discount_number_bundle) / 100;
                                                $discount_total = $total - $tot_discount;
                                                echo wc_price(esc_html(round($discount_total, 1, PHP_ROUND_HALF_UP))); ?>
                                            </strong>
                                        </span>
                                        <button type="submit" name="add_to_cart_bundle" class="btn btn-success bundle_button_servizi" data-prod-id="<?= esc_attr(implode(',', $var)); ?>" data-discount="<?= esc_attr(get_post_meta($post->ID, 'discount_number_bundle', true)); ?>" data-check="<?= esc_attr(get_post_meta($post->ID, 'activate_discount_bundle_checkbox', true)); ?>">
                                            <?php echo esc_html_e('Buy this offer', 'bundle-servizitrepuntozero-domain'); ?>
                                        </button>
                                    <?php
                                    } else
                                    {
                                        $var = get_post_meta($post->ID, 'select_products_bundle', true); ?>
                                        <span class="title_total_price_bundle_mobile" style="color: black; font-size: 16px; font-weight: 900;">
                                            <strong> <?= esc_html_e('Products Total', 'bundle-servizitrepuntozero-domain'); ?></strong>
                                        </span>
                                        <span class="total_price_bundle_mobile" style="padding-bottom: 20px; font-size: 16px; font-weight: 600; color: black;">
                                            <strong class="bundle_price_total_of_products_full"><?php echo wc_price(esc_html($total)); ?></strong>
                                        </span>
                                        <button type="submit" name="add_to_cart_bundle" class="btn btn-success bundle_button_servizi" data-prod-id="<?= esc_attr(implode(',', $var)); ?>" data-check="<?= esc_attr(get_post_meta($post->ID, 'activate_discount_bundle_checkbox', true)); ?>">
                                            <?php echo esc_html_e('Buy this offer', 'bundle-servizitrepuntozero-domain'); ?>
                                        </button>
                                    <?php
                                    } ?>
                                </div>
                            </form>
                        </td>
                    </tr>
                    <?php
                    $total = 0;
                    for ($i = 0; $i < count($select_products_bundle); $i++)
                    {
                        $output_bundle = wc_get_product($select_products_bundle[$i]);
                        $link = get_permalink($output_bundle->get_id());
                        $prices_bundle = $output_bundle->get_price();
                        $out = $output_bundle->get_id();
                        $total += $prices_bundle;
                        ?>
                        <tr class="show_text_name_bundle_images_mobile">
                            <td class="bundle_name_images_single_mobile" style="padding-top: 0 !important; padding-bottom: 0 !important; display: flex; flex-direction: row; align-items: baseline; justify-content: space-between; border-bottom: 0;">
                                <li class="name_bundle_show_text_mobile" style="color: #5a5a5a; text-align: left !important;">
                                    <a class="link_bundle_single_image_title_mobile" href="<?php echo esc_url($link); ?>" style="text-decoration: none; color: #5a5a5a;">
                                        <strong class="bundle_single_text_title_mobile" style="font-size: 15px;"><?php echo esc_html($output_bundle->get_title()); ?></strong>
                                    </a>
                                </li>
                                <?php if ($activate_discount_bundle_checkbox == "yes")
                                {
                                    ?>
                                    <span class="price_discounted_bundle_mobile" style="font-weight: 600; margin-left: 16px;">
                                        <strong>
                                            <s class="discount_price_single_mobile" style="font-size: 14px; color: red;"><?php echo wc_price(esc_html($prices_bundle)); ?></s>
                                        </strong>
                                        <strong class="full_price_single_mobile" style="font-size: 16px; color: black;">
                                            <?php
                                            $tot_disc = ($prices_bundle * $discount_number_bundle) / 100;
                                            $discount_single = $prices_bundle - $tot_disc;
                                            echo wc_price(esc_html(round($discount_single, 1, PHP_ROUND_HALF_UP))); ?>
                                        </strong>
                                    </span>
                                <?php
                                } else
                                {
                                    ?>
                                    <span class="full_price_bundle_mobile" style="font-weight: 600; margin-left: 16px;">
                                        <strong class="full_price_single_mobile" style="font-size: 16px; color: black;"><?php echo wc_price(esc_html($prices_bundle)); ?></strong>
                                    </span>
                                    </li>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    <?php
    }
}
add_action('woocommerce_after_single_product_summary', 'spb_display_on_content_single_product_page');
?>
