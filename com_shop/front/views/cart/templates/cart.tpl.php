<div id="cart-view">    <form method="post" name="update_cart" action="<?php echo Route::get("component=shop&con=cart"); ?>" >        <div class="cart">            <div class="page-title title-buttons">                <h1><?php _e('Shopping Cart', 'com_shop'); ?></h1>            </div>            <?php do_action("com_shop_before_cart", $this); ?>            <div class="table-responsive">                <table class="table data-table cart-table" id="shopping-cart-table">                    <thead>                        <tr>                            <th rowspan="1"></th>                            <th rowspan="1"><span class="nobr"><?php _e('Product Name', 'com_shop'); ?></span></th>                            <th colspan="1" class="a-center"><span class="nobr"><?php _e('Unit Price', 'com_shop'); ?></span></th>                            <th class="a-center" rowspan="1"><?php _e('Qty', 'com_shop'); ?></th>                            <th colspan="1" class="a-center"><?php _e('Subtotal', 'com_shop'); ?></th>                            <th class="a-center" rowspan="1"><?php _e('Remove', 'com_shop'); ?></th>                        </tr>                    </thead>                    <tfoot>                        <tr>                            <td class="a-left" colspan="6">                                <a href="<?php echo Route::get("component=shop"); ?>" class="btn btn-success"><?php _e('Continue Shopping', 'com_shop'); ?></a>                                <button class="btn btn-info"><?php _e("Update Cart","com_shop"); ?></button>                            </td>                        </tr>                    </tfoot>                    <tbody>                        <?php if (!$this->cart->is_empty()) while ($p = $this->cart->get_item()) { ?>                                <tr>                                    <td>                                        <?php if (!empty($p->thumb)): ?>                                            <a class="product-image" title="<?php echo strings::htmlentities($p->name); ?>" href="<?php echo get_permalink($p->id); ?>">                                                <img class="img-responsive" alt="<?php echo strings::htmlentities($p->thumb_title); ?>" src="<?php echo $p->thumb; ?>" />                                            </a>                                        <?php endif; ?>                                    </td>                                    <td>                                        <h2 class="product-name">                                            <a href="<?php echo get_permalink($p->id); ?>"><?php echo strings::htmlentities($p->name); ?></a>                                        </h2>                                        <?php foreach ((array) $p->props as $prop) { ?>                                            <dl class="item-options">                                                <dt><?php echo $prop->name; ?><span class="price"><?php echo $prop->price; ?></span></dt>                                            </dl>                                        <?php } ?>                                    </td>                                    <td class="a-right">                                        <span class="cart-price">                                            <span class="price"><?php echo $p->price_formatted; ?></span>                                        </span>                                    </td>                                    <td class="a-center">                                        <span class="input-text qty"><input class="<?php echo in_array($p->group, (array) $this->update_errors) ? 'qtyUpdateError' : ''; ?>" type="text" name="qty[<?php echo $p->group; ?>]" value="<?php echo $p->qty; ?>" /></span>                                    </td>                                    <td class="a-right">                                        <span class="cart-price">                                            <span class="price"><?php echo Factory::getApplication('shop')->getHelper('price')->format($p->price * $p->qty); ?></span>                                        </span>                                    </td>                                    <td class="a-center"><a class="btn btn-small" title="<?php _e('Remove item', 'com_shop'); ?>" href="<?php echo Route::get("component=shop&con=cart&task=remove&group=" . $p->group); ?>"><span class="icon-trash"></span></a></td>                                </tr>                            <?php } ?>                        <?php if ($this->cart->is_empty()) { ?>                            <tr><td colspan="6" align="left"><?php _e('Your cart is currently empty.', 'com_shop'); ?></td></tr>                        <?php } ?>                    </tbody>                </table>            </div>            <?php do_action("com_shop_after_cart", $this); ?>            <div class="cart-collaterals">                <div class="totals">                    <table id="shopping-cart-totals-table">                        <colgroup>                            <col />                            <col width="1" />                        </colgroup>                        <tbody>                            <tr>                                <td colspan="1" class="a-right" style="">                                    <?php _e('Subtotal:', 'com_shop'); ?>                                </td>                                <td class="a-right" style="">                                    <span class="price"><?php echo $this->cart->get_formatted_price(); ?></span>                                  </td>                            </tr>                        </tbody>                    </table>                    <a class='btn btn-primary' href='<?php echo Route::get("component=shop&con=cart&task=checkout"); ?>'><?php _e('Proceed to Checkout', 'com_shop'); ?></a>                    <div class="clr"></div>                </div>            </div>            <div class="clr"></div>        </div>    </form></div>