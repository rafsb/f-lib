<?php
namespace abox;
include_once('../modal.php');

//print_r(in());
$from    = in("from");

$o = new Modal("{{#}}",conf("enterprise"),AB_DIALOG);
$o->bstart();?>
    <div class="stretch" style="margin-bottom:2.25rem;overflow:visible">
        <p class='lt justify tlt spd sys'></p>
        <div class='abs -tp100% -lt0 bar'>
            <div
                class="lt tct bdisabled fdark wh hyp cur" 
                onclick="ab.apply(function(_me){
                    var x = document.getElementById('<?=$from?>');
                    _me.parentModal().getElementsByClassName('-closed')[0].click();
                    if(x.dataset.reject) eval(x.dataset.reject.replace(/::this/g,'document.getElementById(\'<?=$from?>\')'));
                },this)">
                NÃO
            </div>
            <div
                class="lt bspan fwhite tct wh hyp cur"
                onclick="ab.apply(function(_me){
                    var x = document.getElementById('<?=$from?>');
                    _me.parentModal().getElementsByClassName('-closed')[0].click();
                    if(x.dataset.confirm) eval(x.dataset.confirm.replace(/::this/g,'document.getElementById(\'<?=$from?>\')'));
                },this)">
                SIM
            </div>
        </div>
    </div>
    <script>
        {{ %# }} = {
            init : function(){
                var
                el = $("#{{#}} p:first");
                el.html(document.getElementById('<?=$from?>').dataset.message);
                ab.organize();
                this.container.appear();
                ab.loading(AB_OUT);

            }
        }
    </script>
<?php
$o->bend(true);