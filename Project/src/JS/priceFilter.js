function priceFilter (allProducts, minPrice, maxPrice) {
    for (let i=0;i<allProducts.length;i++) {
        productElement = allProducts[i];
        price = productElement.getElementsByClassName("price")[0].innerHTML.slice(1);
        if (price<parseInt(minPrice.value) || price>parseInt(maxPrice.value)) {
            productElement.style.display = "none";
        }
        else {
            productElement.style.display = "inline-block";
        }
    }
}