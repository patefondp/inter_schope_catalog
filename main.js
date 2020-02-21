

function init() {
    $.post(
        "core.php",
        {
            "action" : "init"
        },
        showGoods
    )
};

function showGoods(data) {
    data = JSON.parse(data);
    console.log(data);
};

$('document').ready(function (){
    console.log("hi");
    init();
});
