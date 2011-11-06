<?php defined('_JEXEC') or die('Restricted access'); ?>
<script>
    var $j = jQuery.noConflict();

    // Use jQuery via $j(...)
    $j(document).ready(function(){
        $j("#couponorder").validate();
        $j("#cuse").change(function(){
            getPreview();
        });
        $j("#ccouponamount").change(function(){
            getPreview();
        });
        $j("#cdedication").change(function(){
            getPreview();
        });
        $j("#load").click(function() {
            $j("#corderprocessemail").attr("checked", "checked");
            $j("#cdedication").val("An meine liebe ...");
            $j("#cfirstname").val("Harald");
            $j("#clastname").val("Frebort");
            $j("#cemail").val("harald.frebort@gmx.at");
            $j("#cphone").val("0699 12 722 963");
            $j("#cstreet").val("Pottendorferstr. 14");
            $j("#ccity").val("Weigelsdorf");
            $j("#czipcode").val("2483");
        });
    });
    function getPreview() {
        var inputdata= "use="+$j("select[name=use] option:selected").val()
            + "&dedication="+$j("textarea[name=dedication]").val()
            + "&couponcode="+$j("input[name=couponcode]").val()
            + "&couponamount="+$j("input[name=couponamount]").val()
            + "&orderdate="+$j("input[name=orderdate]").val();
        $j.ajax({
            url:    "components/com_coupon/coupon.preview.php",
            type:   "GET",
            data:   inputdata,
            success: function(data){
                $j("#imgplaceholder").html('<img src="components/com_coupon/'+data+'" alt="coupon preview" />');
            }
        });
    }
</script>

<div><?=$this->params->get('order_process');?></div>
<!--div><?=$this->params->get('account_information');?></div-->

<div>
    <form action="index.php?option=com_coupon" method="post" name="couponorder" id="couponorder">
        <input name="task" type="hidden" value="order"/>
        <input name="Itemid" type="hidden" value="<?=JRequest::getVar( 'Itemid' );?>"/>
        <input name="orderdate" type="hidden" value="<?=date("d.m.Y")?>"/>
        <input name="couponcode" type="hidden" value="<?=date("Ymd") . rand(100, 999);?>"/>
        <fieldset id="fieldset">
            <legend id="legend">Angaben zur Bestellung des Gutscheines</legend>
            <div id="imgplaceholder"></div>
            <div id="forminput">
                <p>
                    <label for="corderprocesspost">Versand</label><em>*</em>
                    <input id="corderprocesspost" checked type="radio" name="orderprocess" value="post" />per Post
                    <input id="corderprocessemail" type="radio" name="orderprocess" value="email" />per Email
                </p>
                <p>
                    <label for="ccouponamount">Betrag</label><em>*</em>
                    <input id="ccouponamount" name="couponamount" size="4" min="50" max="1000" class="required digits" value="50" />&euro;
                </p>
                <p>
                    <label for="cdedication">Widmung</label><em>&nbsp;</em>
                    <textarea id="cdedication" name="dedication" cols="25" rows="3"  maxlength="30"></textarea>
                </p>
                <p>
                    <label for="cuse">Verwendungszweck</label><em>&nbsp;</em>
                    <select id="cuse" name="use" size="1">
                        <option value="Allgemein">Allgemein</option>
                        <option value="Glasblasen">Glasblasen</option>
                        <option value="Malkurs">Malkurs</option>
                    </select>
                </p>
                <p>
                    <label for="cfirstname">Vorname</label><em>*</em>
                    <input id="cfirstname" name="firstname" size="25" class="required" minlength="2" />
                </p>
                <p>
                    <label for="clastname">Nachname</label><em>*</em>
                    <input id="clastname" name="lastname" size="25" class="required" minlength="2" />
                </p>
                <p>
                    <label for="cemail">E-Mail</label><em>*</em>
                    <input id="cemail" name="email" size="25"  class="required email" />
                </p>
                <p>
                    <label for="cphone">Telefonnummer</label><em>*</em>
                    <input id="cphone" name="phone" size="25" class="required" />
                </p>
                <p>
                    <label for="cstreet">Stra&szlig;e</label><em>*</em>
                    <input id="cstreet" name="street" size="25"  class="required" />
                </p>
                <p>
                    <label for="ccity">Ort</label><em>*</em>
                    <input id="ccity" name="city" size="25"  class="required" />
                </p>
                <p>
                    <label for="czipcode">PLZ</label><em>*</em>
                    <input id="czipcode" name="zipcode" size="4" minlength="4" class="required digits" />
                </p>
                <p>
                    <input id="cagb" name="agb" type="checkbox" class="required" checked /><?=$this->params->get('agb');?><br />
                    <input id="cnewsletter" name="newsletter" type="checkbox" /><?=$this->params->get('newsletter');?>
                </p>
                <p>
                    <input type="submit" name="send_order" value="Bestellung absenden" />
                    <input type="reset" name="reset_order" value="Abbrechen" />
                    <?php
                    if ( 1 == $this->params->get('coupon_debug') ) {?>
                        <input type="button" id="load" value="load test data" />
                    <?}?>
                </p>
            </div>
        </fieldset>
    </form>
</div>