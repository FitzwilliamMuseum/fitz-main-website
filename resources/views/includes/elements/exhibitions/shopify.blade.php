@section('exhibition-shopify')

<div class="container-fluid bg-grey py-3">
    <div class="container mb-3">
        <h3 class="mt-3">TEST</h3>


<div id='collection-component-1683290166747'></div>
<script type="text/javascript">
/*<![CDATA[*/
(function () {
  var scriptURL = 'https://sdks.shopifycdn.com/buy-button/latest/buy-button-storefront.min.js';
  if (window.ShopifyBuy) {
    if (window.ShopifyBuy.UI) {
      ShopifyBuyInit();
    } else {
      loadScript();
    }
  } else {
    loadScript();
  }
  function loadScript() {
    var script = document.createElement('script');
    script.async = true;
    script.src = scriptURL;
    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(script);
    script.onload = ShopifyBuyInit;
  }
  function ShopifyBuyInit() {
    var client = ShopifyBuy.buildClient({
      domain: 'cambridgecollections.myshopify.com',
      storefrontAccessToken: '740a996dfbaa515df5490a60627073d2',
    });
    ShopifyBuy.UI.onReady(client).then(function (ui) {
      ui.createComponent('collection', {
        id: '443532640554',
        node: document.getElementById('collection-component-1683290166747'),
        moneyFormat: '%C2%A3%7B%7Bamount%7D%7D',
        options: {
  "product": {
    "styles": {
      "product": {
        "@media (min-width: 601px)": {
          "max-width": "calc(25% - 20px)",
          "margin-left": "20px",
          "margin-bottom": "50px",
          "width": "calc(25% - 20px)"
        },
        "img": {
          "height": "calc(100% - 15px)",
          "position": "absolute",
          "left": "0",
          "right": "0",
          "top": "0"
        },
        "imgWrapper": {
          "padding-top": "calc(75% + 15px)",
          "position": "relative",
          "height": "0"
        }
      },
      "title": {
        "font-family": "Open Sans, sans-serif",
        "font-weight": "normal",
        "color": "#2d2b2b"
      },
      "button": {
        "font-family": "Open Sans, sans-serif",
        "font-size": "16px",
        "padding-top": "16px",
        "padding-bottom": "16px",
        ":hover": {
          "background-color": "#383f46"
        },
        "background-color": "#212529",
        ":focus": {
          "background-color": "#383f46"
        }
      },
      "quantityInput": {
        "font-size": "16px",
        "padding-top": "16px",
        "padding-bottom": "16px"
      },
      "price": {
        "font-family": "Lato, sans-serif"
      },
      "compareAt": {
        "font-family": "Lato, sans-serif"
      },
      "unitPrice": {
        "font-family": "Lato, sans-serif"
      }
    },
    "buttonDestination": "modal",
    "contents": {
      "options": false
    },
    "text": {
      "button": "View product"
    },
    "googleFonts": [
      "Open Sans",
      "Lato"
    ]
  },
  "productSet": {
    "styles": {
      "products": {
        "@media (min-width: 601px)": {
          "margin-left": "-20px"
        }
      }
    }
  },
  "modalProduct": {
    "contents": {
      "img": false,
      "imgWithCarousel": true,
      "button": false,
      "buttonWithQuantity": true
    },
    "styles": {
      "product": {
        "@media (min-width: 601px)": {
          "max-width": "100%",
          "margin-left": "0px",
          "margin-bottom": "0px"
        }
      },
      "button": {
        "font-family": "Open Sans, sans-serif",
        "font-size": "16px",
        "padding-top": "16px",
        "padding-bottom": "16px",
        ":hover": {
          "background-color": "#383f46"
        },
        "background-color": "#212529",
        ":focus": {
          "background-color": "#383f46"
        }
      },
      "quantityInput": {
        "font-size": "16px",
        "padding-top": "16px",
        "padding-bottom": "16px"
      },
      "title": {
        "font-family": "Open Sans, sans-serif",
        "font-weight": "bold",
        "font-size": "28px",
        "color": "#4c4c4c"
      },
      "price": {
        "font-family": "Lato, sans-serif",
        "font-weight": "normal",
        "font-size": "18px",
        "color": "#4c4c4c"
      },
      "compareAt": {
        "font-family": "Lato, sans-serif",
        "font-weight": "normal",
        "font-size": "15.299999999999999px",
        "color": "#4c4c4c"
      },
      "unitPrice": {
        "font-family": "Lato, sans-serif",
        "font-weight": "normal",
        "font-size": "15.299999999999999px",
        "color": "#4c4c4c"
      },
      "description": {
        "font-family": "Open Sans, sans-serif"
      }
    },
    "googleFonts": [
      "Open Sans",
      "Lato"
    ],
    "text": {
      "button": "Add to cart"
    }
  },
  "option": {},
  "cart": {
    "styles": {
      "button": {
        "font-family": "Open Sans, sans-serif",
        "font-size": "16px",
        "padding-top": "16px",
        "padding-bottom": "16px",
        ":hover": {
          "background-color": "#383f46"
        },
        "background-color": "#212529",
        ":focus": {
          "background-color": "#383f46"
        }
      }
    },
    "text": {
      "title": "Shopping Cart",
      "total": "Subtotal",
      "notice": "Shipping costs calculated at Checkout. Fulfilment by Curatingcambridge.com",
      "button": "Checkout"
    },
    "googleFonts": [
      "Open Sans"
    ]
  },
  "toggle": {
    "styles": {
      "toggle": {
        "font-family": "Open Sans, sans-serif",
        "background-color": "#212529",
        ":hover": {
          "background-color": "#383f46"
        },
        ":focus": {
          "background-color": "#383f46"
        }
      },
      "count": {
        "font-size": "16px"
      }
    },
    "googleFonts": [
      "Open Sans"
    ]
  }
},
      });
    });
  }
})();
/*]]>*/
</script>

</div>
</div>

@endsection
