let
splash = $(".--screen.--splash").at().css({background:"@BACKGROUND"}).app(_("div", "-fixed -zero-bottom -row").app(
    _("div","--boot-progress -left", { width:0, background:"@CLOUDS", height:".5em"})
));

app.call("src/img/logos/logo.svg").then(r => {
    if(r.status==200) r = r.data.morph()[0];
    else return;
    r.get("path").each((me, i) => me.css({
        opacity:0
        , "stroke-dasharray":  me.getTotalLength()
        , "stroke-dashoffset": me.getTotalLength()
        , "stroke": app.colors().CLOUDS
    }, me => {
        me.anime({opacity:1, "stroke-dashoffset":0}, ANIMATION_LENGTH*4, ANIMATION_LENGTH/2*i);
    }));
    splash.pre(r.css({width:"40%", top:"10%"}))
    app.components.logo_svg = r.cloneNode(true)
    bootstrap.ready("splash")
})