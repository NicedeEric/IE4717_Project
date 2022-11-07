function sortPriceHtoL(product1, product2) {
    product1Price = parseInt(product1.getElementsByClassName("price")[0].innerHTML.slice(1));
    product2Price = parseInt(product2.getElementsByClassName("price")[0].innerHTML.slice(1));
    if (product1Price == product2Price) {
        return 0
    }
    return product1Price < product2Price ? 1 : -1
}
function sortPriceLtoH(product1, product2) {
    product1Price = parseInt(product1.getElementsByClassName("price")[0].innerHTML.slice(1));
    product2Price = parseInt(product2.getElementsByClassName("price")[0].innerHTML.slice(1));
    if (product1Price == product2Price) {
        return 0
    }
    return product1Price < product2Price ? -1 : 1
}
function sortDefault(product1, product2) {
    product1Id = product1.id;
    product2Id = product2.id;
    if (product1Id == product2Id) {
        return 0
    }
    return product1Id < product2Id ? -1 : 1
}
function removeAllDiv(elements) {
    while (elements[0]) {
        elements[0].parentNode.removeChild(elements[0]);
    }
}
function sortProduct(option, productDivs) {
    var readyToSortProductDivs  = Array.prototype.slice.call( productDivs, 0 )
    removeAllDiv(productDivs);
    if (option=="price: low to high") {
        readyToSortProductDivs.sort(sortPriceLtoH);
    }
    else if (option=="price: high to low") {
        readyToSortProductDivs.sort(sortPriceHtoL);
    }
    else {
        readyToSortProductDivs.sort(sortDefault);
    }
    for (let l=0;l<readyToSortProductDivs.length;l++) {
        document.getElementsByClassName("productListing")[0].appendChild(readyToSortProductDivs[l]);
    } 
}