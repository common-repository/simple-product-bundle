<?php
function spb_icon_admin_panel()
{
    $navigationbar_icon_base64 = 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAyNS4yLjEsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGl2ZWxsb18xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCINCgkgd2lkdGg9IjI0MHB4IiBoZWlnaHQ9IjI0MC42cHgiIHZpZXdCb3g9IjAgMCAyNDAgMjQwLjYiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDI0MCAyNDAuNjsiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPGcgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMC4wMDAwMDAsNzUwLjAwMDAwMCkgc2NhbGUoMC4xMDAwMDAsLTAuMTAwMDAwKSI+DQoJPHBhdGggZD0iTTEwODAuOCw3Mjk5LjZjLTE0MC4xLTE2LjctMjgwLjctNjQuOS00MDEuNi0xMzcuNmMtMTExLjktNjcuMS0yMjAuNy0xNjcuMy0yOTUuNi0yNzEuOA0KCQljLTEwNS40LTE0Ny4yLTE2OC4yLTMxNC4xLTE4NS41LTQ5NS4zYy01LjYtNTYuOS0yLjUtMTg2LjcsNS42LTIzOWMxNy42LTExMy41LDQ0LjItMTk2LjksOTQuOS0yOTkuOQ0KCQljNTUtMTExLjYsMTExLTE4OC42LDIwMS4zLTI3N2MxNjEuNC0xNTcuNCwzNzEuNi0yNTQuOCw2MDAuNy0yNzcuOWM0MC44LTQsMTU0LTQsMTk1LjQsMGMxOTkuNywxOS44LDM5MS4xLDEwMC4yLDU0Ni45LDIyOS43DQoJCWMzOC4zLDMxLjgsMTA1LjcsMTAwLjUsMTM3LDEzOS43YzEwOC41LDEzNi4zLDE3OC40LDI5Mi41LDIwNy41LDQ2NC43YzEyLjEsNzEuNywxMC4yLDgzLjItNCwyNi45Yy0yMi45LTg4LjEtNTMuNS0xNjQuNS05NC42LTIzNQ0KCQljLTIzMS4zLTM5Ni40LTcwOS41LTU2Mi4xLTExMzEuNi0zOTIuNmMtMjA4LjcsODMuOC0zNzYuMywyMzguNC00NzcuNCw0NDAuNmMtNjYuMiwxMzIuMy05Ni41LDI2MC42LTk2LjgsNDA2LjYNCgkJYzAsOTAuOSwxMC4yLDE2NS40LDM0LjMsMjUwLjRjMzMuNCwxMTguMSw5MS44LDIzMS4zLDE2OC4yLDMyNi4yYzI0LjcsMzAuOSw4Ni45LDk0LDExOS42LDEyMi4xYzEyMCwxMDIsMjc0LjksMTc1LjYsNDMwLjQsMjA0LjENCgkJYzM0LjMsNi4yLDEwNS43LDEzLjYsMTMzLjksMTQuMmMxNS41LDAuMywxOS41LDAuOSwxMy45LDIuOEMxMjcwLDczMDUuOCwxMTIxLDczMDQuMiwxMDgwLjgsNzI5OS42eiIvPg0KCTxwYXRoIGQ9Ik0xMjEyLjIsNzIzMS45Yy05Ny40LTEyLjEtMTgwLjYtMzYuNS0yNjcuNC03OC41Yy05NC4zLTQ1LjgtMTU3LjEtOTAuNi0yMzEuOS0xNjUuNGMtNzAuOC03MC44LTExNC43LTEzMS4xLTE1Ny43LTIxNS4yDQoJCUM0OTMuNCw2NjUwLjYsNDY0LDY1MjcsNDY0LDYzODYuM2MwLTE5NC41LDU4LjQtMzY1LjQsMTc5LTUyNGMzMC0zOS42LDEwNy42LTExNy4yLDE0Ny4yLTE0Ny4yYzEyNC4zLTk0LjYsMjUzLjItMTQ5LDQwNS0xNzEuOQ0KCQljNTIuOS03LjcsMTg2LjEtNy43LDIzNi41LDBjMTA3LjksMTYuNywyMDYuOCw0OS44LDI5Mi4yLDk3LjFjNTYsMzEuMiw2My4xLDM5LjMsMTcsMTkuNWMtMTc3LjItNzctMzgwLTg0LjctNTYzLjMtMjINCgkJYy0xMTcuMiw0MC4yLTIxNC45LDEwMS4xLTMwMi40LDE4OC45Yy0xMjUuNSwxMjUuMi0yMDAsMjc2LjQtMjI2LjMsNDU5LjFjLTUuMywzNy4xLTUuMywxNjEuNCwwLjMsMTk3LjkNCgkJYzEzLjMsOTAsMzcuMSwxNjguNSw3NC4yLDI0NC4yYzExNy44LDIzOS45LDM0MS4zLDQwMC43LDYwOS40LDQzNy44YzE3LDIuNSw1Ny44LDQuMyw5Ny40LDQuM2M3MS43LDAsMTAxLjEtMy4xLDE2My45LTE2LjENCgkJYzYyLjUtMTMsMTY0LjItNDkuNSwyMDEuOS03Mi43YzUuNi0zLjQsMTEuMS01LjYsMTIuMS00LjNjMi41LDIuNSw0LjMsMC45LTMxLjgsMjQuN2MtMTA2LjcsNjkuNi0yMzMuNywxMTUtMzYyLjcsMTMwLjINCgkJQzEzNjUuOSw3MjM3LjQsMTI1OCw3MjM3LjQsMTIxMi4yLDcyMzEuOXoiLz4NCgk8cGF0aCBkPSJNMTQyMC45LDcxMDcuOWMtMTg1LjUtMTMuOS0zNDMuMi04NS00NjkuOS0yMTIuN2MtMTM5LjctMTQwLjctMjEzLjktMzI5LjYtMjA3LjgtNTI5YzMuNC0xMDguNSwyNi4zLTIwMC43LDczLjMtMjk2LjgNCgkJYzg0LjQtMTcyLjIsMjM2LjItMzA0LjgsNDE2LjgtMzY0LjhjMTQuMi00LjYsMjYuMy03LjcsMjYuOS03LjFjMC45LDAuNi0xMi4xLDgtMjguNCwxNi43Yy02My40LDMyLjItMTIyLjEsNzYuNC0xNzQuMSwxMjkuOQ0KCQljLTk0LjMsOTcuNy0xNTYuMSwyMTgtMTc5LjMsMzQ5LjFjLTQxLjQsMjMxLjYsNDMuNiw0NzAuNiwyMjEuNyw2MjMuM2MyMDYuNSwxNzcuNSw0OTIuMiwyMTMuOSw3MzMuNCw5My43DQoJCWMyNC43LTEyLjQsNTYuOS0zMC4zLDcxLjQtMzkuOWMxMDMuNi02OS4zLDE4OC4zLTE2Ny45LDIzOS45LTI3OC42YzcuNC0xNi40LDE0LjUtMjkuNCwxNS4xLTI4LjRjMi41LDIuMi0xNS4xLDU5LjEtMjcuOCw5MC42DQoJCWMtMjkuNyw3My45LTc0LjIsMTQ3LjItMTI2LjEsMjA3LjFjLTExMy44LDEzMi42LTI3OS44LDIyMC43LTQ1NS4xLDI0Mi40QzE1MjIsNzEwNi43LDE0NDMuNSw3MTA5LjUsMTQyMC45LDcxMDcuOXoiLz4NCjwvZz4NCjwvc3ZnPg0K';
    $navigationbar_icon_data_uri = 'data:image/svg+xml;base64,' . $navigationbar_icon_base64;
    $servizi_menu_slug = 'servizi-tre-punto-zero';

    if (empty(menu_page_url($servizi_menu_slug, false)))
    { //Check if menu page already exist, if not, show once submenu page about installed plugin in menu page (Servizi 3.0)
        add_menu_page(
            'Servizi 3.0',
            'Servizi 3.0',
            'manage_options',
            $servizi_menu_slug,
            'spb_bf_admin_options',
            $navigationbar_icon_data_uri
        );

        add_submenu_page(
            $servizi_menu_slug,
            'Simple Product Bundle - Free',
            'Simple Product Bundle - Free',
            'manage_options',
            'spb_bf_admin_options',
            'spb_bf_admin_page',
            23
        ); //Create submenu plugin page

        remove_submenu_page(
            $servizi_menu_slug,
            $servizi_menu_slug
        ); //REMOVE SUBMENU FIRST PAGE (Main menu voice)

    } else
    { //Else, if admin menu voice "Servizi 3.0" exist, attach this plugin voice.

        add_submenu_page( //Create submenu plugin page
            $servizi_menu_slug,
            'Simple Product Bundle - Free',
            'Simple Product Bundle - Free',
            'manage_options',
            'spb_bf_admin_options',
            'spb_bf_admin_page',
            23
        ); //REMOVE SUBMENU FIRST PAGE (Main menu voice)
    }
}
add_action('admin_menu', 'spb_icon_admin_panel');

// Save DATA and so is visible on every post
function spb_save_data_global($post)
{
    $chk = sanitize_text_field(isset($_POST['activate_bundle_checkbox']) && $_POST['activate_bundle_checkbox'] ? 'yes' : 'no');
    update_post_meta($post, 'activate_bundle_checkbox', $chk);

    if (isset($_POST['bundle_title_text']))
    {
        $text = sanitize_textarea_field(isset($_POST['bundle_title_text']) ? $_POST['bundle_title_text'] : '');
        update_post_meta($post, 'bundle_title_text', $text);
    }

    $chk_1 = sanitize_text_field(isset($_POST['activate_discount_bundle_checkbox']) && $_POST['activate_discount_bundle_checkbox'] ? 'yes' : 'no');
    update_post_meta($post, 'activate_discount_bundle_checkbox', $chk_1);

    if (isset($_POST['discount_number_bundle']))
    {
        $disc = sanitize_text_field(isset($_POST['discount_number_bundle']) ? $_POST['discount_number_bundle'] : '');
        update_post_meta($post, 'discount_number_bundle', $disc);
    }

    if (isset($_POST['select_products_bundle']))
    {
        update_post_meta($post, 'select_products_bundle', array_map('sanitize_text_field', $_POST['select_products_bundle']));
    }
}
add_action('save_post', 'spb_save_data_global');

// Save DATA visible on process product meta
function spb_save_data_product_meta()
{
    $chk = sanitize_text_field(isset($_POST['activate_bundle_checkbox']) && $_POST['activate_bundle_checkbox'] ? 'yes' : 'no');
    update_post_meta($post, 'activate_bundle_checkbox', $chk);

    if (isset($_POST['bundle_title_text']))
    {
        $text = sanitize_textarea_field(isset($_POST['bundle_title_text']) ? $_POST['bundle_title_text'] : '');
        update_post_meta($post, 'bundle_title_text', $text);
    }

    $chk_1 = sanitize_text_field(isset($_POST['activate_discount_bundle_checkbox']) && $_POST['activate_discount_bundle_checkbox'] ? 'yes' : 'no');
    update_post_meta($post, 'activate_discount_bundle_checkbox', $chk_1);

    if (isset($_POST['discount_number_bundle']))
    {
        $disc = sanitize_text_field(isset($_POST['discount_number_bundle']) ? $_POST['discount_number_bundle'] : '');
        update_post_meta($post, 'discount_number_bundle', $disc);
    }

    if (isset($_POST['select_products_bundle']))
    {
        update_post_meta($post, 'select_products_bundle', array_map('sanitize_text_field', $_POST['select_products_bundle']));
    }
}
add_action('woocommerce_process_product_meta_simple', 'spb_save_data_product_meta');
add_action('woocommerce_process_product_meta_variable', 'spb_save_data_product_meta');


//Ajax add to cart
function spb_ajax_add_to_cart_bundle()
{
    $ids_bundle = explode(',', sanitize_text_field($_POST['ids']));
    $activate_discount_bundle_checkbox = sanitize_text_field($_POST['discount_chk']);
    $product_id = apply_filters('woocommerce_add_to_cart_product_id', $ids_bundle);
    $groupids = implode('-', $ids_bundle);
    $disc = sanitize_text_field($_POST['discount']);

    for ($i = 0; $i < count($ids_bundle); $i++) {
        $custom_data = [];
        if ($activate_discount_bundle_checkbox == "yes")
        {
            if (!empty($disc))
            {
                $prod_bundle_ajax = wc_get_product($ids_bundle[$i]);
                $custom_data['custom_data']['rob_discounted_price'] = $prod_bundle_ajax->get_price() - (($prod_bundle_ajax->get_price() / 100) * $disc);
                $custom_data['custom_data']['rob_full_price'] = $prod_bundle_ajax->get_price();
                $custom_data['custom_data']['rob_group_ids'] = $groupids;
            }

            if (apply_filters('woocommerce_add_to_cart_validation', true, $ids_bundle[$i]) && WC()->cart->add_to_cart($ids_bundle[$i], 1, 0, [], $custom_data))
            {
                do_action('woocommerce_ajax_add_to_cart', $ids_bundle[$i]);
                wc_add_to_cart_message($ids_bundle[$i], true);

            } else
            {
                $data = array(
                    'error' => true,
                    'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($ids_bundle[$i]), $ids_bundle[$i])
                );
                return wp_send_json($data);
            }
        } else
        {
            if (apply_filters('woocommerce_add_to_cart_validation', true, $ids_bundle[$i]) && WC()->cart->add_to_cart($ids_bundle[$i]))
            {
                do_action('woocommerce_ajax_add_to_cart', $ids_bundle[$i]);
                wc_add_to_cart_message($ids_bundle[$i], true);
            } else
            {
                $data = array(
                    'error' => true,
                    'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($ids_bundle[$i]), $ids_bundle[$i])
                );
                return wp_send_json($data);
            }
        }
    }
    WC_AJAX::get_refreshed_fragments();
    wp_die();
}
add_action('wp_ajax_spb_ajax_add_to_cart_bundle', 'spb_ajax_add_to_cart_bundle');
add_action('wp_ajax_nopriv_spb_ajax_add_to_cart_bundle', 'spb_ajax_add_to_cart_bundle');

//Change price of product
function spb_change_cart_price($cart)
{
    foreach ($cart->get_cart() as $cart_item_key => $cart_item) {
        $custom_search = false;

        if (isset($cart_item['custom_data']['rob_group_ids']))
        {
            $key = $cart_item['product_id'];
            $count = 1;

            foreach ($cart->get_cart() as $cart_item_key => $cart_item_search)
            {
                if (isset($cart_item_search['custom_data']['rob_group_ids']) && $key != $cart_item_search['product_id'] && $cart_item_search['custom_data']['rob_group_ids'] == $cart_item['custom_data']['rob_group_ids'])
                {
                    $count++;
                    if ($cart_item_search['quantity'] == 1)
                    {
                        $custom_search = true;
                    } else
                    {
                        $custom_search = false;
                        break;
                    }
                }
            }
            if ($custom_search)
            {
                if ($count != count(explode('-', $cart_item['custom_data']['rob_group_ids'])))
                {
                    $cart_item['data']->set_price($cart_item['custom_data']['rob_full_price']);
                } elseif ($cart_item['quantity'] == 1)
                {
                    $cart_item['data']->set_price(round($cart_item['custom_data']['rob_discounted_price'], 1, PHP_ROUND_HALF_UP));
                } else
                {
                    $cart_item['data']->set_price($cart_item['custom_data']['rob_full_price']);
                }
            }
        }
    }
}
add_action('woocommerce_before_calculate_totals', 'spb_change_cart_price', 30, 1);

//Change price in Mini Cart
function spb_change_mini_cart_price($output, $cart_item, $cart_item_key)
{
    $custom_search = false;
    if (isset($cart_item['custom_data']['rob_group_ids']))
    {
        $key = $cart_item['product_id'];
        $count = 1;
        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item_search) {
            if (isset($cart_item_search['custom_data']['rob_group_ids']) && $key != $cart_item_search['product_id'] && $cart_item_search['custom_data']['rob_group_ids'] == $cart_item['custom_data']['rob_group_ids'])
            {
                $count++;
                if ($cart_item_search['quantity'] == 1)
                {
                    $custom_search = true;
                } else
                {
                    $custom_search = false;
                    break;
                }
            }
        }
        if ($custom_search)
        {
            if ($count != count(explode('-', $cart_item['custom_data']['rob_group_ids'])))
            {
                $output = '<span class="quantity">' . sprintf('%s &times; %s', $cart_item['quantity'], wc_price($cart_item['custom_data']['rob_full_price'])) . '</span>';
            } elseif ($cart_item['quantity'] == 1)
            {
                $output = '<span class="quantity"><s>' . sprintf('%s &times; %s', $cart_item['quantity'], wc_price($cart_item['custom_data']['rob_full_price'])) . '</s>' . '&nbsp;&nbsp;' . sprintf('%s &times; %s', $cart_item['quantity'], wc_price(round($cart_item['custom_data']['rob_discounted_price'], 1, PHP_ROUND_HALF_UP))) . '</span>';
            } else
            {
                $output = '<span class="quantity">' . sprintf('%s &times; %s', $cart_item['quantity'], wc_price($cart_item['custom_data']['rob_full_price'])) . '</span>';
            }
        }
    }
    return $output;
}
add_filter('woocommerce_widget_cart_item_quantity', 'spb_change_mini_cart_price', 50, 3);
?>