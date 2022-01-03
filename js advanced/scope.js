a = 5;

var a;

function asdf() {
    console.log(a);

    var b = 6;
    console.log(b);

    if (true) {
        let d = 8;
    }

    // console.log(d); -> d is with block scope
}

// console.log(b); -> b not defined in the global scope

asdf();

const f = 9;
// f = 4; -> f is const

const constObj = { prop: 5 };
constObj.prop = 6;

const constArr = [1];
constArr.push(2);

const frozenObj = Object.freeze({
    prop: 1,
    complexProp: {
        prop: 2
    },
    arr: [1, 2, 3]
});

// frozenObj.prop = 5; -> error
frozenObj.complexProp.prop = 3;

for (var i = 0; i < 5; ++i) {
    setTimeout(function() {
        console.log(i);
    }, 1000);
}

for (let i = 0; i < 5; ++i) {
    setTimeout(function() {
        console.log(i);
    }, 1000);
}

const config = {
    host: 'localhost',
    port: 8080,
    connect: function() { console.log('Connecting...'); }
};

config.connect();

const bascketModule = (function() {
    let basket = [];

    return {
        addItem: function (item) { basket.push(item); },
        getItemCount: function() { return basket.length; },
        getItems: function() { return basket; }
    };
})();

bascketModule.addItem('banana');
bascketModule.getItemCount();
bascketModule.getItems();