var sessionId = /SESS\w*ID=([^;]+)/i.test(document.cookie) ? RegExp.$1 : false;

// function viewEvent(prodKey, prodName, userID) {
//     if (userID !== null) {
//         window.tracker.track("productView1", {
//             userId: userID,
//             prodId: prodKey,
//             prodName: prodName,
//             eventTime: new Date().toISOString()
//         });
//     } else {
//         window.tracker.track("productView0", {
//             userId: sessionId,
//             prodId: prodKey,
//             eventTime: new Date().toISOString()
//         });
//     }
// }

function viewEvent(prodKey, prodName) {
    window.tracker.track("productView1", {
        prodId: prodKey,
        prodName: prodName,
        eventTime: new Date().toISOString()
    });
}

function categoryEvent(catKey, userID) {

    if (userID !== null) {
        window.tracker.track("Category", {
            userId: userID,
            catId: catKey,
            eventTime: new Date().toISOString()
        });
    } else {
        window.tracker.track("Category", {
            userId: sessionId,
            catId: catKey,
            eventTime: new Date().toISOString()
        });
    }
}

function categoryConsoles(userID) {

    if (userID !== null) {

        window.tracker.track('categoryConsoles1', {
            userId: userID,
            catId: "63bc84a1f71ca172f3000bf4",
            eventTime: new Date().toISOString()
        });
    } else {
        window.tracker.track('categoryConsoles0', {
            userId: sessionId,
            catId: "63bc84a1f71ca172f3000bf4",
            eventTime: new Date().toISOString()
        });
    }

}

function categoryVideogames(userID) {

    if (userID !== null) {

        window.tracker.track('categoryVideogames1', {
            userId: userID,
            catId: "609c994d1a47dc1b3d566464",
            eventTime: new Date().toISOString()
        });
    } else {
        window.tracker.track('categoryVideogames0', {
            userId: sessionId,
            catId: "609c994d1a47dc1b3d566464",
            eventTime: new Date().toISOString()
        });
    }
}

function categorySmartPhones(userID) {

    if (userID !== null) {

        window.tracker.track('categorySmartPhones1', {
            userId: userID,
            catId: "63bc856d78307226c00564e3",
            eventTime: new Date().toISOString()
        });
    } else {
        window.tracker.track('categorySmartPhones0', {
            userId: sessionId,
            catId: "63bc856d78307226c00564e3",
            eventTime: new Date().toISOString()
        });
    }
}

function categoryAudio(userID) {

    if (userID !== null) {

        window.tracker.track('categoryAudio1', {
            userId: userID,
            catId: "63bc78ff78307226c00564e2",
            eventTime: new Date().toISOString()
        });
    } else {
        window.tracker.track('categoryAudio0', {
            userId: sessionId,
            catId: "63bc78ff78307226c00564e2",
            eventTime: new Date().toISOString()
        });
    }
}

function categoryCameras(userID) {

    if (userID !== null) {

        window.tracker.track('categoryCameras1', {
            userId: userID,
            catId: "609f338fb1f95a615e5eda23",
            eventTime: new Date().toISOString()
        });
    } else {
        window.tracker.track('categoryCameras0', {
            userId: sessionId,
            catId: "609f338fb1f95a615e5eda23",
            eventTime: new Date().toISOString()
        });
    }
}

function categoryAccessories(userID) {

    if (userID !== null) {

        window.tracker.track('categoryAccessories1', {
            userId: userID,
            catId: "63bcf11585d923f2c729255c",
            eventTime: new Date().toISOString()
        });
    } else {
        window.tracker.track('categoryAccessories0', {
            userId: sessionId,
            catId: "63bcf11585d923f2c729255c",
            eventTime: new Date().toISOString()
        });
    }
}

function cartEvent(prodKey, userID) {
return;
    if (userID) {
        window.tracker.track('Cart', {
            userId: userID,
            prodId: prodKey,
            eventTime: new Date().toISOString()
        });
    } else {
        p = window.tracker.track('Cart', {
            userId: sessionId,
            prodId: prodKey,
            eventTime: new Date().toISOString()
        });
        return p.then(()=>{
            console.log("a");
        });
    }
}

function buyEvent(ticket, cart, userID, amount) {

    if (userID !== null) {
        window.tracker.track('Buy2', {
            userId: userID,
            prodId: cart,
            ticket: ticket,
            amount: amount,
            eventTime: new Date().toISOString()
        });
    } else {
        window.tracker.track('Buy2', {
            userId: sessionId,
            prodId: cart,
            ticket: ticket,
            amount: amount,
            eventTime: new Date().toISOString()
        });
    }
}
