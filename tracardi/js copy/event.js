var sessionId = /SESS\w*ID=([^;]+)/i.test(document.cookie) ? RegExp.$1 : false;

function viewEvent(prodKey, userID) {

    if (userID !== null) {
        eurekaTracker.track('View', {
            eventType: 'View',
            userId: userID,
            prodId: prodKey,
            eventTime: new Date().toISOString()
        });
    } else {
        eurekaTracker.track('View', {
            eventType: 'View',
            userId: sessionId,
            prodId: prodKey,
            eventTime: new Date().toISOString()
        });
    }
}

function categoryEvent(catKey) {

    eurekaTracker.track('Category', {
        eventType: 'Category',
        userId: sessionId,
        catId: catKey,
        eventTime: new Date().toISOString()
    });
}

function categoryConsoles(userID) {

    if (userID !== null) {

        eurekaTracker.track('categoryConsoles1', {
            eventType: 'categoryConsoles1',
            userId: userID,
            catId: "609b6b80c267887c931481d2",
            eventTime: new Date().toISOString()
        });
    } else {
        eurekaTracker.track('categoryConsoles2', {
            eventType: 'categoryConsoles2',
            userId: sessionId,
            catId: "609b6b80c267887c931481d2",
            eventTime: new Date().toISOString()
        });
    }

}

function categoryVideogames(userID) {

    if (userID !== null) {

        eurekaTracker.track('categoryVideogames1', {
            eventType: 'categoryVideogames1',
            userId: userID,
            catId: "609c994d1a47dc1b3d566464",
            eventTime: new Date().toISOString()
        });
    } else {
        eurekaTracker.track('categoryVideogames2', {
            eventType: 'categoryVideogames2',
            userId: sessionId,
            catId: "609c994d1a47dc1b3d566464",
            eventTime: new Date().toISOString()
        });
    }
}

function categorySmartPhones(userID) {

    if (userID !== null) {

        eurekaTracker.track('categorySmartPhones1', {
            eventType: 'categorySmartPhones1',
            userId: userID,
            catId: "609d9c08c2458673dc3120b3",
            eventTime: new Date().toISOString()
        });
    } else {
        eurekaTracker.track('categorySmartPhones2', {
            eventType: 'categorySmartPhones2',
            userId: sessionId,
            catId: "609d9c08c2458673dc3120b3",
            eventTime: new Date().toISOString()
        });
    }
}

function categoryAudio(userID) {

    if (userID !== null) {

        eurekaTracker.track('categoryAudio1', {
            eventType: 'categoryAudio1',
            userId: userID,
            catId: "609f337ad5d7d50d79289d73",
            eventTime: new Date().toISOString()
        });
    } else {
        eurekaTracker.track('categoryAudio2', {
            eventType: 'categoryAudio2',
            userId: sessionId,
            catId: "609f337ad5d7d50d79289d73",
            eventTime: new Date().toISOString()
        });
    }
}

function categoryCameras(userID) {

    if (userID !== null) {

        eurekaTracker.track('categoryCameras1', {
            eventType: 'categoryCameras1',
            userId: userID,
            catId: "609f338fb1f95a615e5eda23",
            eventTime: new Date().toISOString()
        });
    } else {
        eurekaTracker.track('categoryCameras2', {
            eventType: 'categoryCameras2',
            userId: sessionId,
            catId: "609f338fb1f95a615e5eda23",
            eventTime: new Date().toISOString()
        });
    }
}

function categoryAccessories(userID) {

    if (userID !== null) {

        eurekaTracker.track('categoryAccessories1', {
            eventType: 'categoryAccessories1',
            userId: userID,
            catId: "609f339afdef0623bf4032c3",
            eventTime: new Date().toISOString()
        });
    } else {
        eurekaTracker.track('categoryAccessories2', {
            eventType: 'categoryAccessories2',
            userId: sessionId,
            catId: "609f339afdef0623bf4032c3",
            eventTime: new Date().toISOString()
        });
    }
}

function cartEvent(prodKey, userID) {

    if (userID !== null) {
        eurekaTracker.track('Cart', {
            eventType: 'Cart',
            userId: userID,
            prodId: prodKey,
            eventTime: new Date().toISOString()
        });
    } else {
        eurekaTracker.track('Cart', {
            eventType: 'Cart',
            userId: sessionId,
            prodId: prodKey,
            eventTime: new Date().toISOString()
        });
    }
}

function buyEvent(ticket, cart, userID) {

    if (userID !== null) {
        eurekaTracker.track('Buy', {
            eventType: 'Buy',
            userId: userID,
            prodId: cart,
            ticket: ticket,
            eventTime: new Date().toISOString()
        });
    } else {
        eurekaTracker.track('Buy', {
            eventType: 'Buy',
            userId: sessionId,
            prodId: cart,
            ticket: ticket,
            eventTime: new Date().toISOString()
        });
    }
}
