var $config = $("#config");
var isDebug = true;
if (!isDebug) console.log = function(){};

var Extras;
Extras = {

  resizeWindow: true,

  init: function () {

  
    this.minicartImage();
    this.topMenu();

    // Логин в шапке
    this.showLoginPopup('.header__login-btn', '.account-popup', 'body');

    if($('.session-expired').length > 0) this.showPopup('.session-expired');

    if (this.isIE9) {
      console.log('ie 9 or less');
    } else {
      // Мобильное меню
      this.mobileMenu();
    }

    // Кнопка мобильного меню
    this.mobileMenuToggle('.cd-nav-trigger', '.main-nav-mobile', 'nav-is-visible', 400);
    // Логин в мобильной
    this.showLoginPopup('.mobile-login-btn', '.account-popup', '.header');
    // Выбор города в мобильной
    Extras.navigateByLetters('.cities-mobile__letter', '.cities-mobile__lists', 50);
    // Mobile search
    this.mobileSearch('.header__mob-search-btn', '.mobile-search', '.mobile-search input', '.mobile-search .close-search');

  },


  // INDEX PAGE
  indexPage: {
    init: function () {
      if (Extras.isIE9) {
        console.log('ie 9');
      } else {
        // На главной верхний слайдер
        Extras.topSlider('.top-slider');
      }
      // На главной 3 слайдера
      Extras.productSlider(15, 4, 4);
      // На главной блок Рекомендуемые в мобильном
      Extras.mobileToggle('.recommend .list-title');
    }
  },

  // LISTING PAGE
  listingPage: {
    init: function () {
      // Ротатор в разделе Новинки
      Extras.productSlider(30, 3, 3);

      if (Extras.options.widthScreen <= 1170) {
        // Меню для категорий
        Extras.mobileToggle('.sb-box .list-title');
        // Меню для брендов с логотипом
        Extras.mobileToggle('.sb-box .simple-banner');
        // сортировка в мобильном
        Extras.mobileSort('.mobile-sort-btn', '.mobile-sort');
        // фильтр в мобильном
        Extras.mobileFilter('.mobile-filter-btn', '.mobile-filter', '.close-filter');
        Extras.mobileSubmenu();
      } else {
        // Submenu in sidebar
        Extras.showSidebarSubmenu();
      }


      // Показывать/прятать листинг (в брендзоне)
      Extras.showHideListing();


      var scrollTop = function() {
        var $upBtn = $('.up-btn');

        $(window).scroll(function() {
          if ((document.body.scrollTop||document.documentElement.scrollTop) > document.documentElement.clientHeight*1.5) {
            $upBtn.fadeIn(400);
          } else {
            $upBtn.fadeOut(400);
          }
        });

        $upBtn.on('click', function() {
          $('html, body').animate({ scrollTop: 0 }, 'fast');
        });

      };

      scrollTop();

    }
  },

  // PRODUCT PAGE
  productPage: {
    init: function () {
      // Маленький слайдер сопутствующих товаров
      Extras.productSliderSmall('.similar-slider', '.similar-slider__prev', '.similar-slider__next', 3, 0);
      // В карточке товаров слайдер с изображениями товара
      Extras.productCardSlider();
      // В карточке товаров вкладки
      Extras.productCardTabs();
      // Социальные кнопки
      Extras.shareSocials();
      // Свернуть описание
      Extras.hideDescription('.product-card__description', 'product-card__description_btn', 200);
      // Отзывы
      Extras.reviews();
    }
  },

  // PRODUCT PAGE
  brandzoneProductPage: {
    init: function () {
      // В карточке товаров слайдер с изображениями товара
      Extras.productCardSlider();
      Extras.countProducts.init();
    }
  },

  // CART PAGE
  cartPage: {
    init: function () {
      // Маленький слайдер сопутствующих товаров
      console.log("Start Extras.productSliderSmall");
      Extras.productSliderSmall('.similar-slider', '.similar-slider__prev', '.similar-slider__next', 3, 0);
      console.log("End Extras.productSliderSmall");

        console.log("Start Extras.cartPage.bind()");
      Extras.cartPage.bind();
      console.log("End Extras.cartPage.bind()")
    },
    config: {
      // Interval between calls in case of incorrect responses
      retryRequestTime: 1000,
      // Maximum AJAX requests locking time (lock will be released anyway after time specified)
      requestLockTimeout: 5000,
      // Specifies delay between using quantity controls and sending request
      controlCommitTimeout: 3000,
      // If user inputs new quantity and pointer doesn't leave an input field request will be sent after time specified
      inputAutocommit: 2000,
      // Maximum amount of unsuccessful attempts to load cart data
      maxCartLoadingRetryAttempts: 5,
      ajaxTimeout: 10000,
      popupDuration: 4000,
      imageFormat: 'thumbnail',
      updateTypes: {
        entryQuantity: 1,
        applyVoucher: 2,
        releaseVoucher: 3,
        fullCart: 4
      }
    },
    velocityTemplate: null,
    helpers: {
      getProductDataFromCartForEntryNumber: function (cartData, entryNumber) {
        if (cartData && cartData.entries && cartData.entries.length > 0) {
          for (var i = 0; i < cartData.entries.length; i++) {
            var entry = cartData.entries[i];
            if (entry.entryNumber == entryNumber) {
              return entry.product;
            }
          }
        }
        return null;
      }
    },
    handlers: {
      findCartEntry: function (eventData) {
        console.log("Looking for cart entry associated with the event:");
        console.log(eventData);
        var $cartEntry = $(eventData.target).closest(".cart__item");
        console.log("Found");
        console.log($cartEntry);
        return $cartEntry;
      },
      getEntryNumber: function ($cartEntry) {
        var entryNumber = parseInt($cartEntry.data("entry-number"), 10);
        if (isNaN(entryNumber)) {
          throw "Could not get correct entry number! Entry number: " + entryNumber;
        }
        console.log("EntryNumber = " + entryNumber);
        return entryNumber;
      },
      getProductCode: function ($cartEntry) {
        var productCode = $cartEntry.data("product-code");
        console.log("productCode = " + productCode);
        return productCode;
      },
      getQuantityInput: function ($cartEntry) {
        var $quantityInput = $cartEntry.find("input[name=quantity]");
        if ($quantityInput.length == 0) {
          console.log($quantityInput);
          throw "Could not find quantity input for entry ";
        } else if ($quantityInput.length > 1) {
          console.log($quantityInput);
          throw "More than one quantity input found for entry ";
        }
        console.log("Quantity input:");
        console.log($quantityInput);
        return $quantityInput;
      },
      getProductPrice: function($cartEntry) {
          var elem = $cartEntry[0];
          var cp = $(elem).contents().find('div.cart__price-product_price').text().trim();
          return cp.substr(0, cp.indexOf(' '));
      },
      getQuantityForInputItem: function ($quantityInput) {
        var quantity = parseInt($quantityInput.val(), 10);
        if (isNaN(quantity)) {
          throw "Could not get correct quantity";
        }
        return quantity;
      },
      getQuantity: function ($cartEntry) {
        var $quantityInput = this.getQuantityInput($cartEntry);
        return this.getQuantityForInputItem($quantityInput);
      },

      getEntryData: function ($cartEntry) {
        console.log("Getting entry data for cart entry:");
        console.log($cartEntry);
        var entryData = {
          entryNumber: this.getEntryNumber($cartEntry),
          productCode: this.getProductCode($cartEntry),
          quantity: this.getQuantity($cartEntry),
            price: this.getProductPrice($cartEntry)
        };
        console.log("Result:");
        console.log(entryData);
        return entryData;
      },

      getModificationPrototypeForEntryData: function (entryData) {

        var modification = {
          entryNumber: entryData.entryNumber,
          productCode: entryData.productCode,
          initialQuantity: entryData.quantity,
          quantity: entryData.quantity,
          isSetAside: false,
          isRemoved: entryData.quantity <= 0,
            price: entryData.price
        };

        console.log("Creating modification instance. Entry data:");
        console.log(entryData);

        console.log("Modification:");
        console.log(modification);

        return modification;
      },

      prepareModification: function (modification) {
        console.log("Preparing modification. Before:");
        console.log(modification);
        if (modification.quantity <= 0) {
          modification.quantity = 0;
          modification.isRemoved = true;
        }
        if (modification.isRemoved) {
          modification.quantity = 0;
        }
        console.log("After:");
        console.log(modification);
      },

      getModificationPrototypeForCartEntry: function ($cartEntry) {

        var entryData = this.getEntryData($cartEntry);

        return this.getModificationPrototypeForEntryData(entryData);

      },

      abstractEntryHandler: function (modifier, eventData) {
        console.log("Event data:");
        console.log(eventData);

        var $cartEntry = this.findCartEntry(eventData);

        var modification = this.getModificationPrototypeForCartEntry($cartEntry);

        if (modifier) {
          console.log("Preparing modification using modifier");
          modifier(modification);
        }

        this.prepareModification(modification);

        console.log("Committing modification:");
        console.log(modification);

        Extras.cartPage.commitModification(modification);

      },

      // Corrects input value. Returns if request should proceed
      correctInput: function ($input, allowEmpty) {

        if (!$input.val() || isNaN($input.val()) || parseInt($input.val(), 10) < 0) {
          if (allowEmpty && $input.val() == "") return false;
          if ($input.data("initialvalue") && !isNaN($input.data("initialvalue"))) {
            // Reset value, no update needed
            $input.val($input.data("initialvalue"));
            return false;
          } else {
            $input.val(1);
          }
        }

        return true;
      },

        refreshFlocktoryHandler: function(eventData) {
            var $cartEntry = this.findCartEntry(eventData);
            var modification = this.getModificationPrototypeForCartEntry($cartEntry);
            var $input = this.getQuantityInput($cartEntry);
            var changedQuantity = $input.data("initialvalue") - modification.quantity;
            if (changedQuantity > 0) {
                window.flocktory = window.flocktory || [];
                window.flocktory.push(['removeFromCart', {
                    item: {
                        id: modification.productCode,
                        count: changedQuantity
                    }
                }]);
            } else {
                window.flocktory = window.flocktory || [];
                window.flocktory.push(['addToCart', {
                    item: {
                        "id": modification.productCode,
                        "price": modification.price,
                        "count": Math.abs(changedQuantity)
                    }
                }]);
            }
        },

      quantityChangeInputHandler: function (eventData) {
          var $cartEntry = this.findCartEntry(eventData);
          var modification = this.getModificationPrototypeForCartEntry($cartEntry);
          console.log(modification);
          var $input = this.getQuantityInput($cartEntry);
          var shouldProceed = this.correctInput($input, false);
          if (!shouldProceed) return;
          this.abstractEntryHandler(null, eventData);
      },

      removeButtonHandler: function (eventData) {

        this.abstractEntryHandler(function (modification) {
          modification.isRemoved = true;
            window.flocktory = window.flocktory || [];
            window.flocktory.push(['removeFromCart', {
                item: {
                    id: modification.productCode,
                    count: modification.quantity
                }
            }]);
        }, eventData);

      },

      redeemVoucherButtonHandler: function (eventData, $voucherCodeInput) {

        console.log("Redeem voucher button clicked");
        console.log(eventData);

        console.log("Voucher code input:");
        console.log($voucherCodeInput);

        var voucherCode = $voucherCodeInput.val();

        var redeemVoucherUrl = ACC.config.contextPath + '/redeemVoucherAjax';

        console.log("Making query to");
        console.log(redeemVoucherUrl);

        Extras.cartPage.makeAjaxCartRequest({
          url: redeemVoucherUrl,
          type: 'POST',
          timeout: Extras.cartPage.config.ajaxTimeout,
          data: {
            voucherCode: voucherCode
          }
        }, function (response) {
          Extras.cartPage.render(response, {
            updateType: Extras.cartPage.config.updateTypes.applyVoucher
          });
        });
      },

      releaseVoucherButtonHandler: function (eventData, voucherCode) {
        var releaseVoucherUrl = ACC.config.contextPath + '/releaseVoucherAjax';
        Extras.cartPage.makeAjaxCartRequest({
          url: releaseVoucherUrl,
          type: 'POST',
          timeout: Extras.cartPage.config.ajaxTimeout,
          data: {
            voucherCode: voucherCode
          }
        }, function (response) {
          Extras.cartPage.render(response, {
            updateType: Extras.cartPage.config.updateTypes.releaseVoucher
          });
        });
      }
    },
    // Assigns handlers to items
    bind: function() {

      console.log("Cart controls event binding");

      var $cartCountPlus = $(".cart__count_plus");
      var $cartCountMinus = $(".cart__count_minus");
      var $updateInput = $(".update-input");
      var $removeButton = $(".cart__item .cart__descr-box_delete");
      var $redeemVoucherButton = $("#redeem-voucher-btn");
      var $voucherCodeInput = $("#voucherCode");
      var $releaseVoucherButton = $(".promotion_voucher .cart__descr-box_delete");
      var $cartItem = $(".cart__item");


      $cartItem.mouseleave(function (eventData) {
        console.log("Mouse left cart item");
        var $cartEntry = Extras.cartPage.handlers.findCartEntry(eventData);
        var $quantityInput = Extras.cartPage.handlers.getQuantityInput($cartEntry);
        $quantityInput.trigger("entryleft", [{timeout: 0}]);
      });

      var quantityControlHandler = function(eventData, getNewQuantity) {

        if (Extras.cartPage.ajaxRequestLock.isLocked()) return;

        var $cartEntry = Extras.cartPage.handlers.findCartEntry(eventData);
        var $quantityInput = Extras.cartPage.handlers.getQuantityInput($cartEntry);
        var quantity = Extras.cartPage.handlers.getQuantityForInputItem($quantityInput);

        $quantityInput.val(getNewQuantity(quantity));

        $quantityInput.trigger("controlused", [{timeout: Extras.cartPage.config.controlCommitTimeout}]);

      };

      console.log("Cart count plus event binding. Item:");
      console.log($cartCountPlus);
      $cartCountPlus.click(function(eventData) {
        quantityControlHandler(eventData, function (quantity) {
            var parent = $cartCountPlus.parent().parent().parent().parent();
            var code = parent.attr("data-product-code");
            var priceStr = parent.find(".cart__price-product_price").text();
            var pr = priceStr.split('');
            var p = '';
            for (var i = 0; i < pr.length; i++) {
                if ((pr[i].match(/\s/g)) || (isNaN(parseInt(pr[i])))) continue;
                p += pr[i];
            }
            window.flocktory = window.flocktory || [];
            window.flocktory.push(['addToCart', {
                item: {
                    "id": code,
                    "price": p,
                    "count": 1
                }
            }]);
          return quantity + 1;
        });
      });

      console.log("Cart count minus event binding. Item:");
      console.log($cartCountMinus);
      $cartCountMinus.click(function(eventData) {
        quantityControlHandler(eventData, function (quantity) {
            var code = $cartCountMinus.parent().parent().parent().parent().attr("data-product-code");
            window.flocktory = window.flocktory || [];
            window.flocktory.push(['removeFromCart', {
                item: {
                    "id": code,
                    "count": 1
                }
            }]);
            return quantity - 1;
        });
      });

      // Autocommit changes after specified period of time
      $updateInput.each(function () {
        var $input = $(this);
        $input.data("initialvalue", $input.val());
        $input.on("keyup controlused entryleft", function (eventData, data) {
          console.log("Affected value of input:");
          console.log($input);
          console.log("Event data:");
          console.log(eventData);
            var initVal = $input.data("initialvalue");
            var newVal = $input.val();

          console.log("Initial value:");
          console.log(initVal);

          console.log("New value:");
          console.log(newVal);

          console.log("Event data:");
          console.log(data);

          // console.log("Timeout id (clearing):");
          // console.log($input.data("timeout"));

          var oldTimerId = $input.data("timeout");
          clearTimeout(oldTimerId);

          // Validates input, prevents request if value is not valid
          var shouldProceed = Extras.cartPage.handlers.correctInput($input, true);
          if (!shouldProceed) return;

          if ($input.data("initialvalue") != $input.val()) {

            var timeToWait = Extras.cartPage.config.inputAutocommit;
            if (data && !isNaN(data.timeout)) {
              timeToWait = data.timeout;
            }


            console.log("Value changed, planning commit after " + timeToWait + "ms");
            var timeout = setTimeout(function () {
              console.log("Emulating change event");
              Extras.cartPage.handlers.quantityChangeInputHandler(eventData);
            }, timeToWait);
            $input.data("timeout", timeout);
          }
        });
      });

      $updateInput.change(function (eventData) {
          Extras.cartPage.handlers.refreshFlocktoryHandler(eventData);
          Extras.cartPage.handlers.quantityChangeInputHandler(eventData);
      });

      $removeButton.click(function (eventData) {
        Extras.cartPage.handlers.removeButtonHandler(eventData);
      });

      $redeemVoucherButton.click(function (eventData) {
        Extras.cartPage.handlers.redeemVoucherButtonHandler(eventData, $voucherCodeInput);
      });

      $releaseVoucherButton.click(function (eventData) {
        var voucherCode = $(eventData.target).closest(".cart__descr-voucher_row").data("vouchercode");
        console.log("Applied voucher with code: " + voucherCode);
        Extras.cartPage.handlers.releaseVoucherButtonHandler(eventData, voucherCode);
      });

      Extras.cartPage.decorateUpdate();

      ACC.checkout.bindCheckO();
    },
    decorateUpdate: function () {
      function UpdateDecorator (before, after) {
        $(document).bind("update_start", before);
        $(document).bind("update_end", after);
      }

      // Showing loader
      new UpdateDecorator(function () {
        Extras.cartPage.showLoader();
      }, function () {
        Extras.cartPage.hideLoader();
      });

      // Prevent input while updating
      new UpdateDecorator(function () {
        $(".update-input").prop("readonly", true);
      }, function () {
        $(".update-input").prop("readonly", false);
      });

      // Saving focus on input
      new UpdateDecorator(function () {
        var $selectedInput = $(document.activeElement);
        var $cartItem = $selectedInput.closest(".cart__item");
        if ($cartItem.length == 1) {
          this.selectedCode = $cartItem.data("product-code");
        }
        console.log("Selected item:");
        console.log(this.selectedCode);
      }, function () {
        if (this.selectedCode) {
          var $input = $(".cart__item[data-product-code=" + this.selectedCode + "] input");
          $input[0].focus();
          $input[0].selectionStart = $input[0].selectionEnd = $input.val().length;
          this.selectedCode = null;
        }
      });
    },
    getLegendForUpdateType: function (updateType) {
      switch (updateType) {
        case Extras.cartPage.config.updateTypes.entryQuantity:
          return ACC.config.cartContext.popupLegends.entryQuantity;
        case Extras.cartPage.config.updateTypes.applyVoucher:
          return ACC.config.cartContext.popupLegends.applyVoucher;
        case Extras.cartPage.config.updateTypes.releaseVoucher:
          return ACC.config.cartContext.popupLegends.releaseVoucher;
        default:
          return ACC.config.cartContext.popupLegends.fullCart;
      }
    },
    // Renders cart from data object
    render: function (data, auxiliaryData) {
      console.log("Rendering cart:");
      console.log(data);

      console.log("Auxiliary data:");
      console.log(auxiliaryData);

      if (data && data.cartData && data.cartData.entries && data.cartData.entries.length == 0) {
        location.reload();
      } else if (!Extras.cartPage.velocityTemplate) {
        Extras.cartPage.loadTemplate(this.renderWithTemplate, data, auxiliaryData);
      } else {
        this.renderWithTemplate(data, auxiliaryData);
      }
    },
    renderWithTemplate: function (cartDataResponse, auxiliaryData) {
      if (Extras.cartPage.velocityTemplate) {

        console.log("Requiring velocityjs");
        var velocityjs = require("velocityjs");

        console.log("Using velocity template: ");
        console.log(Extras.cartPage.velocityTemplate);

        console.log("Setting cart context: ");
        var cartContext = ACC.config.cartContext;
        cartContext.cartData = cartDataResponse.cartData;
        console.log(cartContext);

        if (!cartContext || !cartContext.cartData) {
          console.log("Cannot render cart from query result");
          return Extras.cartPage.updateCart();
        }

        try {
          var newCartHtml = velocityjs.render(Extras.cartPage.velocityTemplate, cartContext);

          // Escaping HTML-encoded characters
          newCartHtml = $("<textarea/>").html(newCartHtml).val();

          console.log("Rendered cart HTML: ");
          console.log(newCartHtml);

          $("#cart").html(newCartHtml);

          Extras.cartPage.bind();

          if (cartDataResponse.message) {
            var updateType = null;
            var product = null;
            if (auxiliaryData) {
              updateType = auxiliaryData.updateType;
              product = auxiliaryData.product;
            }
            var header = Extras.cartPage.getLegendForUpdateType(updateType);
            Extras.cartPage.showMessage(header, cartDataResponse.message, product);
          }

          Extras.cartPage.ajaxRequestLock.releaseLock();

        } catch (e) {
          console.log("Rendering failed. Error: ");
          console.log(e);
        }
      } else {
        console.log("Can not render - no template");
      }
    },
    showMessage: function (legend, message, product) {

      console.log("Showing popup message:");
      console.log({
        legend: legend,
        message: message,
        product: product
      });

      var $popupWindow = $("#addToCartLayer");
      var $legend = $popupWindow.find(".legend");
      var $message = $popupWindow.find(".popupCartItem");


      $legend.html(legend);

      // Get thumbnail image if present
      var imageUrl = null;
      if (product && product.images) {
        product.images.forEach(function(item) {
          if(item.format === Extras.cartPage.config.imageFormat) {
            imageUrl = item.url;
          }
        });
      }

      console.log("Product image url: " + imageUrl);

      var messageHtml = message;
      if (imageUrl) {
        messageHtml = "<img src='" + imageUrl +"' /><p>" + messageHtml + "</p>";
      }

      $message.html(messageHtml);

      var timeout = $popupWindow.data("timeout");

      clearTimeout(timeout);

      $popupWindow.fadeIn(function () {

        timeout = setTimeout(function () {
          $popupWindow.fadeOut();
        }, Extras.cartPage.config.popupDuration);

        $(document).bind("update_start", function () {
          $popupWindow.hide();
        });

        $popupWindow.data("timeout", timeout);

      });

    },
    loadTemplate: function (callback, data, auxiliaryData) {
      console.log("Loading velocity template");

      var serviceUrl = ACC.config.contextPath + '/_ui/velocity/templates/cartData.vm';
      console.log("Making query to " + serviceUrl);

      $.ajax({
        url: serviceUrl,
        type: 'GET',
        timeout: 10000
      }).done(function (response) {
        console.log("Query result is");
        console.log(response);

        Extras.cartPage.velocityTemplate = response;

        console.log("Calling back function: ");
        console.log(callback);

        callback(data, auxiliaryData);
      });

    },
    commitModification: function (modification) {

      var serviceUrl = ACC.config.contextPath + '/cart/update-ajax-v2';
      console.log("Making query to " + serviceUrl);

      Extras.cartPage.makeAjaxCartRequest({
        url: serviceUrl,
        type: 'POST',
        timeout: Extras.cartPage.config.ajaxTimeout,
        beforeSend: function (data) {
          console.log("Query is about to start. Data: ");
          console.log(data);
        },
        data: {
          entryNumber: modification ? modification.entryNumber : null,
          productCode: modification ? modification.productCode : null,
          initialQuantity: modification ? modification.initialQuantity : null,
          isSetAside: modification ? modification.isSetAside : null,
          isRemoved: modification ? modification.isRemoved : null,
          quantity: modification ? modification.quantity : null,
          CSRFToken: $("#CSRFToken").val()
        }
      }, function (result) {

        console.log("Query is done. Result:");
        console.log(result);

        Extras.cartPage.render(result, {
          updateType: Extras.cartPage.config.updateTypes.entryQuantity,
          product: Extras.cartPage.helpers.getProductDataFromCartForEntryNumber(result.cartData, modification.entryNumber)
        });

        ACC.minicart.getMiniCartData(function () {
          ACC.minicart.refreshMiniCartCount();
        });

      }, function (err) {
        console.log("An error occured while making query with modification: ");
        console.log(modification);
        console.log("Error data:");
        console.log(err);
      });
    },
    showLoader: function () {
      $(".preloader").show();
      $(".cart").css("opacity", 0.5);
    },
    hideLoader: function () {
      $(".preloader").hide();
      $(".cart").css("opacity", 1);
    },
    ajaxRequestLock: {
      locked: false,
      selectedCode: null,
      setLock: function () {
        this.locked = true;
        $(document).trigger("update_start");
        var lockObject = this;
        setTimeout(function () {
          lockObject.locked = false;
        }, Extras.cartPage.config.requestLockTimeout);
      },
      releaseLock: function () {
        $(document).trigger("update_end");
        this.locked = false;
      },
      isLocked: function () {
        return this.locked;
      }
    },
    makeAjaxCartRequest: function (settings, doneCallback, errorCallback) {
      if (!Extras.cartPage.ajaxRequestLock.isLocked()) {
        Extras.cartPage.ajaxRequestLock.setLock();
        try {
          $.ajax(settings).done(function (result) {
            if (doneCallback) {
              doneCallback(result);
            }
          }).fail(function (err) {
            if (errorCallback) {
              errorCallback(err);
            }
            console.log("Error occurred during AJAX request. Updating cart");
            Extras.cartPage.updateCart();
          });
        } catch (e) {
          console.log("Ajax request error occured:");
          console.log(e);
          if (Extras.cartPage.updateRetryCount) {
            Extras.cartPage.updateRetryCount++;
            if (Extras.cartPage.config.maxCartLoadingRetryAttempts < Extras.cartPage.updateRetryCount) {
              Extras.cartPage.makeAjaxCartRequest(settings, doneCallback, errorCallback);
            }
          }
        }
      } else {
        console.log("Could not make query. AJAX querying is locked.");
      }
    },
    getCart: function (callback, errorCallback) {
      var serviceUrl = ACC.config.contextPath + '/cart/ajax-cart';
      $.ajax({
        url: serviceUrl,
        timeout: Extras.cartPage.config.ajaxTimeout,
        type: 'GET'
      }).done(function (response) {
        callback(response);
      }).fail(function (response) {
        errorCallback(response);
      });
    },
    updateRetryCount: 0,
    updateCart: function () {
      var self = this;
      Extras.cartPage.getCart(function (response) {
        console.log("Cart loaded successfully");
        Extras.cartPage.render(response, {
          updateType: Extras.cartPage.config.updateTypes.fullCart
        });
        self.updateRetryCount = 0;
      }, function () {
        self.updateRetryCount++;
        if (self.updateRetryCount < Extras.cartPage.config.maxCartLoadingRetryAttempts) {
          console.log("Could not load cart. Retry attempt number " + (self.updateRetryCount + 1));
          Extras.cartPage.updateCart();
        } else {
          console.log("Could not reload cart data. Perhaps page was loaded incorrectly, reloading");
          location.reload();
        }
      });
    }
  },

  // REGISTER PAGE
  registerPage: {
    init: function () {
      $('input[name=phone]').mask('+7(999)999-99-99');
      Extras.privacyPopup();
      RG.login.loginFromPopup('.login-block .login-button', '.login-block');
    }
  },
  checkoutLoginPage: {
      init: function () {
          RG.login.loginFromPopup('.checkout__login .login-button', '.checkout__login');
      }
  },
  feedbackPage: {
    init: function () {
      var btn = $('.btn'),
          info = $('.info-box'),
          preloader = $('.preloader');
      var username = $('[data-name=username]'),
          city = $('[data-name=city]'),
          phone = $('[data-name=phone]'),
          email = $('[data-name=email]'),
          description = $('[data-name=description]');
      var usernameErr = $('[data-class=username_err]'),
          emailErr = $('[data-class=email_err]'),
          descrErr = $('[data-class=descr_err]');

      phone.mask('+7(999)999-99-99');

      btn.on('click', function (e) {
        e.preventDefault();
        preloader.hide();
        usernameErr.empty();
        emailErr.empty();
        descrErr.empty();
        username.css({'border-color': '#a1a1a1'});
        email.css({'border-color': '#a1a1a1'});
        description.css({'border-color': '#a1a1a1'});
        if (!username.val()) {
          usernameErr.text('Введите ваше имя');
          username.css({'border-color': '#cd097d'});
        } else if (!email.val()) {
          emailErr.text('Введите e-mail');
          email.css({'border-color': '#cd097d'});
        } else if (!description.val()) {
          descrErr.text('Введите сообщение');
          description.css({'border-color': '#cd097d'});
        } else {
          $.ajax({
            url: '/newstore/feedback',
            type: 'POST',
            beforeSend: function () {
              preloader.show();
            },
            data: {
              username: username.val(),
              city: city.val(),
              phone: phone.val(),
              email: email.val(),
              description: description.val()
            }
          }).done(function (result) {
            preloader.hide();
            if (result) {
              info.text('Ваше сообщение успешно отправлено, мы обязательно свяжемся с вами!');
              username.val('');
              city.val('');
              phone.val('');
              email.val('');
              description.val('');
              usernameErr.empty();
              emailErr.empty();
              descrErr.empty();
            } else {
              info.text('Произошла ошибка, попробуйте еще раз.');
            }
          }).fail(function (err) {
            console.log('Ajax error: ', err);
            info.text('Произошла ошибка, попробуйте еще раз.');
          });
        }
      });
    }
  },

  // ACCOUNT PAGES
  accountPage: {
    init: function () {
      Extras.mobileToggle('.sb-box .list-title');
      Extras.mobileToggle('.account__history-mobile .list-title');
    }
  },
  accountOrderHistoryPage: {
    init: function () {
      Extras.accountPage.init();
      customSelect();
    }
  },
  accountProfileEditPage: {
    init: function () {
      Extras.accountPage.init();
      customSelect();
      $('input[name=phone]').mask('+7(999)999-99-99');
    }
  },

  // BRANDS MAIN PAGE
  brandsMainPage: {
    init: function () {
      Extras.lettersSlider('.brands-slider', '.brands__letter', 5, true);
      Extras.navigateByLetters('.brands-mobile__letter', '.brands-mobile__lists', 20);
    }
  },

  // BRANDZONES
  brandZone: {
    init: function () {
      if (Extras.options.widthScreen <= 1170) {
        //Extras.mobileToggle('.sb-box .list-title');
      } else {
        Extras.showSidebarSubmenu();
      }

      // Показывать/прятать листинг
      Extras.showHideListing();

    }
  },

  // SPECIAL BRANDS
  chanelBrand: {
    init: function () {
      // В листинге
      Extras.showSidebarSubmenu();
      Extras.productSlider(30, 3, 3);
      Extras.bindToAddToCartForm(".royal-add-to-cart");

      // В карточке товаров слайдер с изображениями товара
      Extras.productCardSlider();
      // В карточке товаров вкладки
      Extras.productCardTabs();
      // В карточке нижний слайдер
      Extras.productSliderSmall('.similar-slider', '.similar-slider__prev', '.similar-slider__next', 3, 30);
    }
  },
  diorBrand: {
    init: function () {
      Extras.productSlider(0, 4, 4);
      Extras.bindToAddToCartForm(".royal-add-to-cart");
      // В карточке товаров слайдер с изображениями товара
      Extras.productCardSlider();
      // В карточке товаров вкладки
      Extras.productCardTabs();

      if (Extras.options.widthScreen <= 1170) {
        // Меню
        Extras.mobileSubmenu();
      } else {
        // В листинге
        Extras.showSidebarSubmenu();
      }

    }
  },
  bobbiBrownBrand: {
    init: function () {
      // В листинге
      //Extras.bindToAddToCartForm(".royal-add-to-cart");
      Extras.productSliderSmall('.similar-slider', '.similar-slider__prev', '.similar-slider__next', 4, 30);

      // В карточке товаров слайдер с изображениями товара
      Extras.productCardSlider();
      // В карточке товаров вкладки
      Extras.productCardTabs();
      // Отзывы
      Extras.reviews();
    }
  },
  smashboxBrand: {
    init: function () {
      // В карточке товаров слайдер с изображениями товара
      Extras.productCardSlider();
      // В карточке товаров вкладки
      Extras.productCardTabs();
      // В карточке нижний слайдер
      Extras.productSliderSmall('.similar-slider', '.similar-slider__prev', '.similar-slider__next', 4, 30);
      // Отзывы
      Extras.reviews();
    }
  },

  hermesBrand: {
    init: function () {

      // Верхний слайдер
      Extras.topSlider('.top-slider');

      // Слайдер с товарами
      Extras.productSlider(30, 3, 3);

      // Боковое меню
      var hermesMenu = function () {

        if (Extras.options.widthScreen > 1170) {
          Extras.showSidebarSubmenu();
          /*var category_code = '';
           var url = window.location.pathname;
           var c = url.indexOf('/rg_brand_127/');
           if (c != -1 && category_code == '') {
           category_code = url.substr(c);
           }
           $('a[href $="' + category_code + '"]').parents('ul').slideDown();
           $('a[href $="' + category_code + '"]').addClass('current');*/
        } else {
          $('.list__sub').removeClass('animated fadeInRight').hide();
          $('.list .dropdown .arr').on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            if ($(this).parent().next('ul').length > 0) {
              e.preventDefault();
              $(this).parent().next('ul').stop(true, true).slideToggle();
              $(this).toggleClass('minus');
            }
          });
        }

      }();

    }

  },

  // Alexander McQueen brand
  mcQueenBrand: {
    init: function () {

      // Показывать/прятать листинг (в брендзоне)
      Extras.showHideListing();

      // About page
      var scrollToPosition = function(top) {
        var $links = $('[data-intLink]');
        var $positions = $('[data-pos]');
        $positions.each(function(i, item) {
          $links.on('click', function(e) {
            e.preventDefault();
            var val = $(this).attr('data-intLink');
            if(item.getAttribute('data-pos') === val) {
              $('html, body').animate({scrollTop: $(item).position().top + top}, 300);
            }
          });
        });
      };

      if(Extras.options.widthScreen <= 740) {
        scrollToPosition(1000);
      } else {
        scrollToPosition(500);
      }

    }
  },

  // MAC brand
  brand__rg_brand_353: {
    init: function () {
      this.sidebarMenu();
    },

    // Боковое меню
    sidebarMenu: function() {

      var items = $('.brandzone-menu').find('.list__item_eq1');
      var subItems = $('.brandzone-menu').find('.list__item_gt1');

      for(var i = 0, len = items.length; i < len; i++) {
        if($(items[i]).hasClass('active')) {
          $(items[i]).parent().show();
        }
      }

      for(var j = 0, sLen = subItems.length; j < sLen; j++) {
        if($(subItems[j]).hasClass('active')) {
          $(subItems[j]).parent().parent().parent().show();
          if(Extras.options.widthScreen > 1170) {
            $(subItems[j]).parent().show();
          }
        }
      }

      // mobile
      if (Extras.options.widthScreen < 1170) {
        $('.list__sub').removeClass('animated fadeInRight').hide();
        $('.list .li_sub .arr').on('click', function (e) {
          e.preventDefault();
          e.stopPropagation();
          if ($(this).parent().next('ul').length > 0) {
            e.preventDefault();
            $(this).parent().next('ul').stop(true, true).slideToggle();
            $(this).toggleClass('minus');
          }
        });
      }
    }
  },
  MacProductPage: {
    init: function() {
      Extras.brand__rg_brand_353.sidebarMenu();
      Extras.productCardSlider();
      Extras.hideDescription('.product-card__description', 'product-card__description_btn', 200);
      Extras.countProducts.init();
    }
  },

  // STATIC PAGE
  staticPage: {
    init: function () {
      Extras.mobileToggle('.sb-box .list-title');
    }
  },

  // FAQ Page
  faqPage: {
    init: function() {
      this.mobileMenu();
      this.sidebarMenu();
      //Extras.resizeWindow = false;
    },
    sidebarMenu: function() {
      var items = $('.sidebar-section .list__item_name');
      items.on('click', function() {
        if($(this).next('ul')) {
          $(this).next('ul').slideToggle(200);
          $(this).toggleClass('active');
        }
      });

      var listItems = document.querySelectorAll('.sidebar-section .list__item');
      listItems.forEach(function(elem) {
        if(elem.classList.contains('list__item_level-second') && elem.classList.contains('current')) {
          var ul = elem.parentElement;
          ul.classList.add('active');
          ul.previousSibling.previousSibling.classList.add('active');
        }
      });
    },
    mobileMenu: function() {
      var items = $('.main-nav-mobile').find('.list__item_name');
      items.on('click', function() {
        if($(this).next('ul')) {
          $(this).next('ul').slideToggle(200);
          $(this).toggleClass('active');
        }
      });
    }
  },


  // ===============================================================================================================


  // CHECKOUT PAGE
  checkout: {
    init: function () {

      Extras.mobileToggle('.toggle-link');
      Extras.checkoutTermsAndCond();

      $("#errorMessage").hide();

      this.util.updateSelects();
      $('input[name=phone]').mask('+7(999)999-99-99');


      $('input').on('invalid input', function () {
        this.setCustomValidity("");
        if (!this.validity.valid) {
          if (this.validity.valueMissing) {
            this.setCustomValidity($(this).data("valuemissingmessage"));
          }
          if (this.validity.patternMismatch) {
            this.setCustomValidity($(this).data("patternmismatchmessage"));
          }
        }
      });

      $("a.checkout__saved-addrs").click(function (e) {
        e.preventDefault();
        Extras.checkout.actions.showSavedAddresses();
      });


      this.items();
      this.regionSelector.init();
      var curReg = this.regionSelector.getCurrentRegionCode();
      if (curReg) {
          this.regionSelector.setCurrentRegion(curReg);
      } else {
          this.regionSelector.setCurrentRegion(Extras.checkout.config.defaults.region);
      }

      this.citySelector.init();
      this.actions.updateCities();

      Extras.checkout.util.onActionComplete("updateCities", function () {

        // Extras.checkout.citySelector.setCurrentCity(Extras.checkout.config.defaults.city);
        Extras.checkout.actions.updateDeliveryModesWithGroups();

        Extras.checkout.util.onActionComplete("updateDeliveryModesWithGroups", function () {

          Extras.checkout.actions.updateFilterMessages();

          Extras.checkout.deliveryModesGroupSelector.setCurrentGroupCode(Extras.checkout.config.defaults.deliverymodegroup);

          Extras.checkout.actions.updateDeliveryModes();

          Extras.checkout.deliveryModeSelector.setCurrentDeliveryModeCode(Extras.checkout.config.defaults.deliverymode);

          Extras.checkout.actions.updateDeliveryModes();

          Extras.checkout.actions.updatePaymentModes();

          Extras.checkout.paymentModeSelector.setCurrentPaymentModeCode(Extras.checkout.config.defaults.paymentmode);

          Extras.checkout.actions.updatePaymentModes();

          Extras.checkout.actions.updateTotals();

            if (Extras.checkout.regionSelector.getCurrentRegionCode().length > 1) {
                Extras.checkout.actions.updateSuggestions();
            }


          $("input[name=firstname]").val(Extras.checkout.config.defaults.firstname);
          $("input[name=lastname]").val(Extras.checkout.config.defaults.lastname);
          $("input[name=phone]").val(Extras.checkout.config.defaults.phone);
          $("input[name=comment]").val(Extras.checkout.config.defaults.comment);
          $("input[name=address]").val(Extras.checkout.config.defaults.address);
          $("input[name=index]").val(Extras.checkout.config.defaults.index);



          // Binding application events to approptiate actions
          $(document).bind("regionChanged", Extras.checkout.actions.updateCities);
          $(document).bind("cityChanged", Extras.checkout.actions.updateDeliveryModesWithGroups);
          $(document).bind("cityChanged", Extras.checkout.actions.updateSuggestions);
          $(document).bind("cityChanged", Extras.checkout.actions.updateFilterMessages);
          $(document).bind("deliveryModesGroupChanged", Extras.checkout.actions.updateDeliveryModes);
          $(document).bind("deliveryModeChanged", Extras.checkout.actions.updatePaymentModes);
          $(document).bind("deliveryModeChanged", Extras.checkout.actions.updateIndexField);
          $(document).bind("paymentModeChanged", Extras.checkout.actions.updateTotals);
          $(document).bind("posSelectionInvoked", Extras.checkout.actions.displayStoresForPickup);
          $(document).bind("posSelected", Extras.checkout.actions.updateDeliveryModes);
          $(document).bind("addressSelected", function (e, data) {
            Extras.checkout.actions.updateAddress(data);
          });
        });
      });

      $("#checkoutForm").submit(function (e) {
          e.preventDefault();
          var $btn = $(this).find('#terms_conditions_button');
          $btn.attr('disabled', 'disabled');
          Extras.checkout.actions.submitData();
          setTimeout(function () {
              $btn.removeAttr('disabled');
          }, 5000);
      });

    },
   
    // Interface items behaviour; initialization, data updating, rendering, placing and event binding
    // For each item implemented life-cylcle phases that it will go through
    items: function () {
      var abstractItem = {
        init: function (data) {
          if (typeof data != "undefined") {
            this.update(data);
            this.bind();
          } else {
            this.bind();
          }
        },
        update: function (data) {
          if (typeof data == "undefined") {
            console.log(data);
            console.log("ERROR: Trying to update with an invalid data object");
          }
          var html = this.render(data);
          this.place(html);
          $(document).trigger(this.changeEventName);
        },
        show: function () {
          $(this.selector).show();
        },
        hide: function () {
          $(this.selector).hide();
        },
        render: function () {
          return $(this.selector).html();
        },
        place: function (html) {
          $(this.selector).html(html);
        },
        bind: function () {
          var changeEventName = this.changeEventName;
          $(this.selector).unbind();
          $(this.selector).change(function () {
            $(document).trigger(changeEventName);
          });
          console.log("Binding. Selector: " + this.selector + "; event name: " + changeEventName);
        }
      };

      function Item(selector, changeEventName) {
        if (typeof selector != "string" || selector.length == 0 ||
            typeof changeEventName != "string" || selector.length == 0 || arguments.length != 2) {
          console.log(arguments);
          console.log("ERROR: Incorrect Item initialization parameters");
        }
        this.selector = selector;
        this.changeEventName = changeEventName;
      }

      Item.prototype = abstractItem;

      this.regionSelector = new Item("select[name=region]", "regionChanged");
      this.regionSelector.getCurrentRegionCode = function () {
        return $(this.selector).val();
      };
      this.regionSelector.setCurrentRegion = function (code) {
        if (!code) {
          code = $(this.selector).find("option").first().val();
        }
        $(this.selector).val(code);
        $(this.selector).change();
      };

      this.citySelector = new Item("select[name=city]", "cityChanged");
      this.citySelector.render = function (data) {
        var resultHtml = "";
        for (var index in data) {
          var city = data[index];
          resultHtml += "<option value='" + city.code + "'>" + city.name + "</option>";
        }
        return resultHtml;
      };
      this.citySelector.place = function (html) {
        $(this.selector).html(html);
        Extras.checkout.util.updateSelects();
      };
      this.citySelector.getCurrentCityCode = function () {
        return $(this.selector).val();
      };
      this.citySelector.getCurrentCityName = function () {
        return $(this.selector).find("option[value=" + $(this.selector).val() + "]").text();
      };
      this.citySelector.setCurrentCity = function (code) {
        if (code && code != $(this.selector).val()) {
          $(this.selector).val(code);
          $(this.selector).change();
        }
      };


      this.deliveryModesGroupSelector = new Item("select[name=delivery]", "deliveryModesGroupChanged");
      this.deliveryModesGroupSelector.render = function (data) {
        var resultHtml = "";
        for (var index in data) {
          var group = data[index];
          resultHtml += "<option value='" + group.uid + "'>" + group.displayName + "</option>";
        }
        console.log("Delivery mode gruops html");
        console.log(resultHtml);
        return resultHtml;
      };
      this.deliveryModesGroupSelector.place = function (html) {
        $(this.selector).html(html);
        Extras.checkout.util.updateSelects();
      };
      this.deliveryModesGroupSelector.getCurrentGroupCode = function () {
        return $(this.selector).val();
      };
      this.deliveryModesGroupSelector.setCurrentGroupCode = function (code) {
        var $items = $(this.selector).find("option");
        $items.each(function () {
          if ($(this).val() == code) {
            $(this).attr("selected", "selected");
          } else {
            $(this).removeAttr("selected");
          }
        });
        Extras.checkout.util.updateSelects();
        this.bind();
      };

      this.deliveryModeSelector = new Item("div.checkout__delivery-methods", "deliveryModeChanged");
      this.deliveryModeSelector.render = function (data) {
        var currentGroup = Extras.checkout.deliveryModesGroupSelector.getCurrentGroupCode();
        var resultHtml = "";
        var isFirst = true;
        if (typeof data == "object") {
          for (var index in data) {
            var deliveryMode = data[index];
            if (deliveryMode.group.uid == currentGroup) {
              // first rendering
              if (!Extras.checkout.data.deliveryMethodCode) {
                if (isFirst && Extras.checkout.config.useFirstDeliveryModeAsDefault) {
                  deliveryMode.active = "checked";
                } else {
                  deliveryMode.active = "";
                }
                if (deliveryMode.group.uid == "pickup") {
                  if (Extras.checkout.posList.getSelectedPosCode()) {
                    deliveryMode.posSelected = true;
                    deliveryMode.selectedPosName = Extras.checkout.posList.getSelectedPosName();
                  } else {
                    deliveryMode.posSelected = false;
                  }
                }
              }
              // after selecting pos
              else {
                if (deliveryMode.code == Extras.checkout.data.deliveryMethodCode) {
                  deliveryMode.active = "checked";
                } else {
                  deliveryMode.active = "";
                }
                if (deliveryMode.code == Extras.checkout.data.deliveryMethodCode) {
                  deliveryMode.active = "checked";
                  if (Extras.checkout.posList.getSelectedPosCode()) {
                    deliveryMode.posSelected = true;
                    deliveryMode.selectedPosName = Extras.checkout.posList.getSelectedPosName();
                  } else {
                    deliveryMode.posSelected = false;
                  }
                }
              }
              if (deliveryMode.group.uid == "pickup") {
                deliveryMode.allowPosSelection = true;
              }
              resultHtml += Mustache.to_html($("#deliveryModeTemplate").html(), deliveryMode);
              var $postIndexMark = $(".checkout__fields_item").find("label[for=index]").find("sup");
              if (deliveryMode.active == "checked") {
                if(deliveryMode.code == "rg_express") {
                    $postIndexMark.text("*");
                } else {
                    $postIndexMark.text("");
                }
              }
              isFirst = false;
            }
          }

          console.log("Generating deliveryModeSelector");
          console.log("Data:");
          console.log(data);
          console.log("HTML:");
          console.log(resultHtml);
          return resultHtml;
        }
      };
      this.deliveryModeSelector.bind = function () {
        var changeEventName = this.changeEventName;
        $(this.selector).find(".checkout__select-pos").click(function (e) {
          e.preventDefault();
          Extras.checkout.data.deliveryMethodCode = $(this.parentNode).find("input[name=delivery-methods]").data("code");
          $(this.parentNode).find("input[name=delivery-methods]").data("code");
          $(this.parentNode).find("input[name=delivery-methods]").attr("checked", "checked");
          $(document).trigger("posSelectionInvoked");
          // return false;
        });
        $(this.selector).find("input[name=delivery-methods]").change(function () {
          console.log("Changed item:");
          console.log($(this));
          $(this).parent().parent().find("input").not($(this)).removeAttr("checked");
          $(this).attr("checked", "checked");
          $(document).trigger(changeEventName);
        });
      };
      this.deliveryModeSelector.getCurrentDeliveryModeCode = function () {
        var input = $(this.selector).find("input[name=delivery-methods]");
        if ($(input).length == 0) {
          console.log("ERROR: Cannot find delivery mode input");
        }
        var selectedInput = null;
        $(input).each(function (index, selectItem) {
          if ($(selectItem).attr("checked") == "checked") {
            selectedInput = selectItem;
          }
        });
        if ($(selectedInput).length != 1) {
          console.log("Delivery mode was not selected");
          return null;
        }
        var value = $(selectedInput).data("code");
        if (value == null || value == "") {
          console.log($(input));
          console.log("ERROR: Selected delivery mode doesn't have a code");
        }
        return value;
      };
      this.deliveryModeSelector.setCurrentDeliveryModeCode = function (code) {
          var input = $(this.selector).find("input[name=delivery-methods]");
        if ($(input).length == 0) {
          console.log("ERROR: Cannot find delivery mode input");
        }
        $(input).each(function (index, selectItem) {
          if ($(selectItem).attr("checked") == "checked") {
            $(selectItem).removeAttr("checked");
          }
          if ($(selectItem).data("code") == code) {
            $(selectItem).attr("checked", "checked");
          }
        });
        if ($(this.selector).find("input[name=delivery-methods]:checked").length == 0) {
          $(this.selector).find("input[name=delivery-methods]").first().attr("checked", "checked");
        }
      };
      this.paymentModeSelector = new Item(".checkout__payment-box", "paymentModeChanged");
      this.paymentModeSelector.render = function (data) {
        var resultHtml = "";
        if (data != null) {
          for (var index in data) {
            var paymentMode = data[index];
            if (index == 0 && Extras.checkout.config.useFirstPaymentModeAsDefault) {
              paymentMode.active = "checked";
            } else {
              paymentMode.active = "";
            }
            resultHtml += Mustache.to_html($("#paymentModeTemplate").html(), paymentMode);
          }
          console.log("Generating paymentModeSelector");
          console.log("Data:");
          console.log(data);
          console.log("HTML:");
          console.log(resultHtml);
        } else {
          resultHtml = $("#noAvailablePaymentModes").html();
        }
        return resultHtml;
      };
      this.paymentModeSelector.bind = function () {
        var changeEventName = this.changeEventName;
        $(this.selector).find("input[name=payment]").change(function () {

          $(this).parent().parent().find("input").not($(this)).removeAttr("checked");
          $(this).attr("checked", "checked");

          $(document).trigger(changeEventName);
        });
      };
      this.paymentModeSelector.getCurrentPaymentModeCode = function () {
        var input = $(this.selector).find("input[name=payment]");
        if ($(input).length == 0) {
          console.log("ERROR: Cannot find payment mode input");
        }
        var selectedInput = null;
        $(input).each(function (index, selectItem) {
          if ($(selectItem).attr("checked") == "checked") {
            selectedInput = selectItem;
          }
        });
        if ($(selectedInput).length != 1) {
          console.log("Delivery mode was not selected");
          return null;
        }
        var value = $(selectedInput).data("code");
        if (value == null || value == "") {
          console.log($(input));
          console.log("ERROR: Selected delivery mode doesn't have a code");
        }
        return value;
      };
      this.paymentModeSelector.setCurrentPaymentModeCode = function (code) {
          var input = $(this.selector).find("input[name=payment]");
        if ($(input).length == 0) {
          console.log("ERROR: Cannot find payment mode input");
        }
        $(input).each(function (index, selectItem) {
          if ($(selectItem).attr("checked") == "checked") {
            $(selectItem).removeAttr("checked");
          }
          if ($(selectItem).data("code") == code) {
            $(selectItem).attr("checked", "checked");
          }
        });
        if ($(this.selector).find("input[name=payment]:checked").length == 0) {
          $(this.selector).find("input[name=payment]").first().attr("checked", "checked");
        }
      };

      this.orderTotals = new Item("div.cart__total", "orderTotalsChanged");
      this.orderTotals.render = function (data) {
        var resultHtml;
        if (data.subTotal && data.totalPrice && data.deliveryCost) {
          console.log(data);
          var resultHtml = Mustache.to_html($("#totalsTemplate").html(), {
            subTotal: data.subTotal.htmlFormattedValue,
            totalPrice: data.totalPrice.htmlFormattedValue,
            deliveryCost: data.deliveryCost.htmlFormattedValue,
            vouchers: data.appliedVouchers
          });
        }
        console.log(resultHtml);
        return resultHtml;
      };

      this.posList = new Item(".in-stores", "posSelected");
      this.posList.render = function (data) {
        var resultHtml = "";
        console.log("Cities list data");
        console.log(data);
        for (var index in data) {
          var pos = data[index];
          resultHtml += Mustache.to_html($("#posListTemplate").html(), pos);
        }
        console.log("Cities list result html");
        console.log(resultHtml);
        return resultHtml;
      };
      this.posList.place = function (html) {
        if (html.length > 0) {
          $(this.selector).find(".available-in-store-results-list").html(html);
        } else {
          $(this.selector).find(".available-in-store-results-list").html('Для выбранного региона места самовывоза отсутствуют.');
        }
      };
      this.posList.bind = function () {
        var selectPosEvent = this.changeEventName;
        $(this.selector).find(".available-in-store-result").click(function () {
          console.log("Store selected: " + $(this).data("code"));
          Extras.checkout.posList.selectedPosCode = $(this).data("code");
          Extras.checkout.posList.selectedPosName = $(this).find(".store-name").text();
          Extras.checkout.posList.hide();
          $(document).trigger(selectPosEvent);
        });
      };
      this.posList.hide = function () {
        console.log("Hiding popup");
        Extras.checkout.util.closePopup();
      };
      this.posList.getSelectedPosCode = function () {
        return Extras.checkout.posList.selectedPosCode;
      };
      this.posList.getSelectedPosName = function () {
        return Extras.checkout.posList.selectedPosName;
      };

      this.savedAddressesPopup = new Item("#saved-addrs", "addressesListUpdated");
      this.savedAddressesPopup.render = function (data) {
        var resultHtml = $(this.selector).find("h2.title")[0].outerHTML;
        console.log("Address list data");
        console.log(data);
        for (var index in data) {
          var address = data[index];
          resultHtml += Mustache.to_html($("#savedAddressesListTemplate").html(), address);
        }
        console.log("Address list result html");
        console.log(resultHtml);
        return resultHtml;
      };
      this.savedAddressesPopup.bind = function () {

        var handleSelection = function (e) {
          e.preventDefault();
          var selectAddressEvent = "addressSelected";
          var addressData = {
            firstName: $(this).data("firstname"),
            lastName: $(this).data("lastname"),
            phone: $(this).data("phone"),
            line1: $(this).data("line1"),
            regionCode: $(this).data("regioncode"),
            cityCode: $(this).data("citycode"),
            comment: $(this).data("comment"),
            postalCode: $(this).data("postalcode")
          };
          console.log("Address selected. Publishing event " + selectAddressEvent + ", data:");
          console.log(addressData);
          $(document).trigger(selectAddressEvent, addressData);
          Extras.checkout.util.closePopup();
        };

        $(this.selector).find(".addr").click(handleSelection);
        $(this.selector).find(".addr .deliver").click(handleSelection);


        $(this.selector).find(".addr .delete").click(function (e) {
          e.preventDefault();
          var $addrItem = $(this).parents(".addr");
          console.log("Removing address");
          console.log($addrItem);

          Extras.checkout.util.loadData(Extras.checkout.resources.deleteAddress, {
            addressCode: $addrItem.data("id")
          }, function (result) {
            if (result == "OK") {
              console.log("Address has been successfully removed");
              $addrItem.remove();
            }
          });
          return false;
        });

      };
    },


    // Application actions, usually reaction to some event
    actions: {
      updateCities: function () {
        var regionSelectorItem = Extras.checkout.regionSelector;
        var citySelectorItem = Extras.checkout.citySelector;
        var regionCode = regionSelectorItem.getCurrentRegionCode();
        if (regionCode && regionCode.length > 1) {
          Extras.checkout.util.loadData(Extras.checkout.resources.cities, {
            regionIso: regionCode
          }, function (data) {
            citySelectorItem.update(data);
            $(document).trigger("action_updateCities_completed");
          });
        } else {
            if (citySelectorItem && citySelectorItem.getCurrentCityCode().length > 1) {
                citySelectorItem.update([{
                    code:"",
                    name:"&nbsp;"
                }]);
            }
          $(document).trigger("action_updateCities_completed");
        }
      },
      updateDeliveryModesWithGroups: function () {

        console.log("Updating delivery modes with groups");

        var deliveryModesGroupSelectorItem = Extras.checkout.deliveryModesGroupSelector;
        var citySelectorItem = Extras.checkout.citySelector;
        var currentCityCode = citySelectorItem.getCurrentCityCode();

        if (currentCityCode && currentCityCode.length > 1) {
          Extras.checkout.util.loadData(Extras.checkout.resources.deliveryModes, {
            cityCode: currentCityCode
          }, function (data) {
            Extras.checkout.data.deliveryModes = data;
            console.log(data);
            // Finding unique delivery mode groups
            var groups = [];
            if (typeof data == "object") {
              for (var index in data) {
                var group = data[index].group;
                console.log("iterating through group");
                console.log(group);

                if (group) {
                  var isGroupNew = true;
                  for (var innerIndex in groups) {
                    var innerGroup = groups[innerIndex];
                    if (innerGroup.uid == group.uid) {
                      isGroupNew = false;
                    }
                  }

                  if (isGroupNew) {
                    groups.push(group);
                  }
                }
              }
            }
            console.log("Unique groups");
            console.log(groups);
            deliveryModesGroupSelectorItem.update(groups);
          });
        }
          setTimeout(function () {
              $(document).trigger("action_updateDeliveryModesWithGroups_completed");
        }, 100);
      },
      updateDeliveryModes: function () {
        var deliveryModeSelectorItem = Extras.checkout.deliveryModeSelector;
        var data = Extras.checkout.data.deliveryModes;
        if (data && typeof data == "object") {
          deliveryModeSelectorItem.init(data);
          Extras.checkout.actions.switchAddressInputState();
        }
        $(document).trigger("action_updateDeliveryModes_completed");
      },
      switchAddressInputState: function () {
        var deliveryModesGroupSelectorItem = Extras.checkout.deliveryModesGroupSelector;
          $addressInput = $("input[name=address]");
        $addressFieldBox = $addressInput.parents(".field-box");
          $indexInput = $("input[name=index]");
        $indexFieldBox = $indexInput.parents(".field-box");
          $streetInput = $("input[name=street]");
        $streetFieldBox = $streetInput.parents(".field-box");
          $houseInput = $("input[name=house]");
        $houseFieldBox = $houseInput.parents(".field-box");

        if (deliveryModesGroupSelectorItem.getCurrentGroupCode() == "delivery") {
          $addressInput.removeAttr("novalidate");
          $indexInput.removeAttr("novalidate");
          $addressInput.attr("required", "true");
          $streetInput.attr("required", "true");
          $houseInput.attr("required", "true");
          $addressFieldBox.show();
          $indexFieldBox.show();
          $streetFieldBox.show();
        } else {
          $addressInput.attr("novalidate", "true");
          $indexInput.attr("novalidate", "true");
          $addressInput.removeAttr("required");
          $streetInput.removeAttr("required");
          $houseInput.removeAttr("required");
          $addressFieldBox.hide();
          $indexFieldBox.hide();
          $streetFieldBox.hide();
        }
      },
      updatePaymentModes: function () {
          var paymentModeSelectorItem = Extras.checkout.paymentModeSelector;
          var deliveryModeSelectorItem = Extras.checkout.deliveryModeSelector;
          var currentDeliveryModeCode = deliveryModeSelectorItem.getCurrentDeliveryModeCode();
          if (!currentDeliveryModeCode) {
              Extras.checkout.deliveryModeSelector.setCurrentDeliveryModeCode(Extras.checkout.config.defaults.deliverymode);
              Extras.checkout.paymentModeSelector.setCurrentPaymentModeCode(Extras.checkout.config.defaults.paymentmode);
              currentDeliveryModeCode = deliveryModeSelectorItem.getCurrentDeliveryModeCode();
          }
          var paymentModes = null;
          if (currentDeliveryModeCode != null) {
              paymentModes = Extras.checkout.data.getPaymentModesForDeliveryModeCode(currentDeliveryModeCode);
          }
          paymentModeSelectorItem.init(paymentModes);
          $(document).trigger("action_updatePaymentModes_completed");
      },

      //FIXME Отладить многократный вызов функции при обновлении страницы
      updateTotals: function () {
        var orderTotalsItem = Extras.checkout.orderTotals;
        var deliveryModeCode = Extras.checkout.deliveryModeSelector.getCurrentDeliveryModeCode();
        var paymentModeCode = Extras.checkout.paymentModeSelector.getCurrentPaymentModeCode();
        var posCode = Extras.checkout.posList.getSelectedPosCode();
        if (deliveryModeCode && paymentModeCode) {
          Extras.checkout.util.loadData(Extras.checkout.resources.submitDeliveryAndPaymentMode, {
            deliveryMethod: deliveryModeCode,
            paymentMethod: paymentModeCode,
            pointOfService: posCode,
            plannedDate: null,
            plannedTime: null,
            CSRFToken: Extras.checkout.data.getSecurityToken()
          }, function (data) {
              var vouchers = [];
              data.appliedVouchers.forEach(function(entry) {
                  vouchers.push(entry.code);
              });
            dataLayer.push({
              'Coupons': vouchers
            });
            console.log(data);
            orderTotalsItem.update(data);
          });
          $(document).trigger("action_updateTotals_completed");
        }
      },
      updateIndexField: function () {
          var $postIndex = $(".checkout__fields_item").find("input[name=index]");
          var $postIndexMark = $(".checkout__fields_item").find("label[for=index]").find("sup");
          var currentDeliveryModeCode = Extras.checkout.deliveryModeSelector.getCurrentDeliveryModeCode();

          if (currentDeliveryModeCode == "rg_express") {
              $postIndex.attr("required", "required");
              $postIndexMark.text("*");
          } else {
              $postIndex.removeAttr("required");
              $postIndexMark.text("");
          }
      },
      updateSuggestions: function () {

        var addressConfig = {

          serviceUrl: Extras.checkout.config.dadata.serviceUrl,
          token: Extras.checkout.config.dadata.token,
          type: Extras.checkout.config.dadata.type,
          hint: "",
          constraints: {
            label: "",
            locations: {
              city: $("select[name=city] option[value=" + $("select[name=city]").val() + "]").text()
            }
          },
          restrict_value: true,
          timeout: 10000,
          onSelect: function (suggestion) {

            function join(arr /*, separator */) {
              var separator = arguments.length > 1 ? arguments[1] : ", ";
              return arr.filter(function(n){return n}).join(separator);
            }

            var address = suggestion.data;
            $("input[name=index]").val(address.postal_code);
            $("input[name=street]").val(
                join([address.street_type, address.street], " ")
            );
            $("input[name=house]").val(
                join([address.house_type, address.house], " ")
            );
            $("input[name=housing]").val(
                join([address.block_type, address.block], " ")
            );
            $("input[name=flat]").val(
                join([address.flat_type, address.flat], " ")
            );

            // Mark that value was selected from the dropdown list but not entered with the keyboard
            $("input[name=address]").data("selected", true);

            var isAddressFull = (suggestion.data.fias_level == 8);
            $("input[name=address]").data("addressfull", isAddressFull);
          }
        };

        Extras.checkout.config.dadataAddressDescriptor = $("input[name=address]").suggestions(addressConfig);
        setTimeout(function(){
          Extras.checkout.config.dadataAddressDescriptor.suggestions('fixData');
        }, 0);

        function fillAddress() {
          console.log("Address text before filling: " + $("input[name=address]").val());
          var composedAddress = $("input[name=street]").val();
          if ($("input[name=house]").val() != "") {
            composedAddress += " " + $("input[name=house]").val() + " " + $("input[name=housing]").val();
            if ($("input[name=flat]").val() != "") {
              composedAddress += " " + $("input[name=flat]").val();
            }
          }

          $("input[name=address]").val(composedAddress);
          console.log("Address text after filling: " + $("input[name=address]").val());

        }

        $("input[name=street], input[name=housing], input[name=house], input[name=flat]").change(fillAddress);

        $(document).trigger("action_updateSuggestions_completed");
      },

      updateFilterMessages: function () {

        Extras.checkout.util.loadData(Extras.checkout.resources.filterMessages, {}, function (data) {
          console.log("Updating filter messages");
          console.log(data);

          var resultHtml = Mustache.to_html($("#filterMessagesTemplate").html(), {
            filters: data
          });

          console.log("Filter messages:");
          console.log(resultHtml);

          $("#deliveryMethodsUnavailabilityNotificationMessages").html(resultHtml && resultHtml.trim() != "" ? '<div class="checkout-info">' + resultHtml + '</div>' : "");

        });

      },
      displayStoresForPickup: function () {
        console.log("Displaying stores for pickup");

        Extras.checkout.util.showPopup($('.in-stores'));

        var currentCityName = Extras.checkout.citySelector.getCurrentCityName();
        var securityToken = Extras.checkout.data.getSecurityToken();
        var deliveryModeCode = Extras.checkout.data.deliveryMethodCode;

        if (currentCityName && securityToken) {
          Extras.checkout.util.loadData(Extras.checkout.resources.storeFinder, {
            town: currentCityName,
            allowDeliveryOnly: true,
            deliveryModeCode: deliveryModeCode,
            CSRFToken: securityToken
          }, function (data) {
            Extras.checkout.posList.init(data);
            console.log("Getting stores response:");
            console.log(data);
          });
        }
        $(document).trigger("action_displayStoresForPickup_completed");
      },
      showSavedAddresses: function () {

        Extras.checkout.util.showPopup($('#saved-addrs'));

        Extras.checkout.util.loadData(Extras.checkout.resources.savedAddresses, {}, function (data) {
          console.log("Getting addresses response:");
          console.log(data);
          Extras.checkout.savedAddressesPopup.init(data);
          $(document).trigger("action_showSavedAddresses_completed");
        });
      },
      updateAddress: function (selectedAddressData) {
        console.log("Address updating. Selected address: ");
        console.log(selectedAddressData);
        console.log("Setting region code " + selectedAddressData.regionCode);
        Extras.checkout.regionSelector.setCurrentRegion(selectedAddressData.regionCode);
        $(document).bind("action_updateCities_completed", function () {
          $(document).unbind("action_updateCities_completed");
          console.log("Setting city code " + selectedAddressData.cityCode);
          Extras.checkout.citySelector.setCurrentCity(selectedAddressData.cityCode);
          $("input[name=firstname]").val(selectedAddressData.firstName);
          $("input[name=lastname]").val(selectedAddressData.lastName);
          $("input[name=phone]").val(selectedAddressData.phone);
          $("input[name=address]").val(selectedAddressData.line1);
          $("textarea[name=comment]").val(selectedAddressData.comment);
        });
      },
      submitData: function () {
        console.log("Form submitting");
        if ($("#checkoutForm")[0].checkValidity()) {
          var addressForm = {
            cityIso: $("[name=city]").val(),
            comment: $("[name=comment]").val(),
            countryIso: "RU",
            firstName: $("[name=firstname]").val(),
            lastName: $("[name=lastname]").val(),
            line1: $("[name=address]").val(),
            line2: "",
            // street: $("[name=street]").val(),
            // house: $("[name=house]").val(),
            // housing: $("[name=housing]").val(),
            // flat: $("[name=flat]").val(),
            phone: $("[name=phone]").val(),
            postCode: $("[name=index]").val(),
            regionIso: $("[name=region]").val()
          };

          if (addressForm.cityIso.length < 2) {
              $('#terms_conditions_button').removeAttr('disabled');
              Extras.checkout.util.showErrorMessage(5);
              return;
          }

          var deliveryModeGroup = Extras.checkout.deliveryModesGroupSelector.getCurrentGroupCode();
          if (deliveryModeGroup == "pickup" && !Extras.checkout.posList.getSelectedPosCode()) {
            $('#terms_conditions_button').removeAttr('disabled');
            Extras.checkout.util.showErrorMessage(14);
            return;
          }

          console.log("Sending address data");
          console.log(addressForm);
          console.log("Form is valid");
          Extras.checkout.util.loadData(Extras.checkout.resources.publishOrder, addressForm, function (data) {
              console.log("Order placing result:");
            console.log(data);
            if (data.result == "OK") {
                console.log("Publishing order");
                console.log("Response:");
                console.log(data);
                if (typeof data.hostedOrderPageData != "undefined") {
                  $("#paymentPostingForm").attr("action", data.hostedOrderPageData.postUrl);
                  $("#paymentPostingForm input[name=Amount]").val(data.hostedOrderPageData.parameters.Amount);
                  $("#paymentPostingForm input[name=ValidUntil]").val(data.hostedOrderPageData.parameters.ValidUntil);
                  $("#paymentPostingForm input[name=ReturnUrl]").val(data.hostedOrderPageData.parameters.ReturnUrl);
                  $("#paymentPostingForm input[name=MerchantId]").val(data.hostedOrderPageData.parameters.MerchantId);
                  $("#paymentPostingForm input[name=OrderId]").val(data.hostedOrderPageData.parameters.OrderId);
                  $("#paymentPostingForm input[name=SecurityKey]").val(data.hostedOrderPageData.parameters.SecurityKey);
                  $("#paymentPostingForm input[name=OrderDescription]").val(data.hostedOrderPageData.parameters.OrderDescription);
                  $("#paymentPostingForm input[name=Currency]").val(data.hostedOrderPageData.parameters.Currency);
                  $("#paymentPostingForm").submit();
                } else if (data && data.orderData && data.orderData.guestCustomer) {
                  Extras.checkout.util.redirect(Extras.checkout.resources.confirmationPage + data.orderData.guid);
                }
                else if (typeof data.onlinePaymentData != "undefined") {
                  //TODO this probably should be rewrited by frontend developer
                  var height = $(window).outerHeight();
                  height = height < 350 ? 350 : height*0.8;

                  var src = data.onlinePaymentData.postUrl + '?';
                  var ampersand = '';
                  $.each(data.onlinePaymentData.parameters,function(key,value){
                    src += ampersand + '' + key + '=' + value;
                    ampersand = '&';
                  });

                  $.magnificPopup.open({
                    items: {
                      src: $('<div class="popup" style="max-width:1090px"><h2 class="title"><span>Оплата</span></h2>' +
                          '<div style="text-align:center"><iframe width="100%" height="' + height + 'px" src="'+ src + '" frameborder="0"></iframe></div></div>')
                    },
                    type: 'inline',
                    fixedContentPos: false,
                    fixedBgPos: true,
                    overflowY: 'auto'
                  });
                }
                else {
                  Extras.checkout.util.redirect(Extras.checkout.resources.confirmationPage + data.orderData.code);
                }

            }
          });

        }
      },
      handleError: function (data) {
        console.log("Error occured. Data:");
        console.log(data);
        var code = data.code;
        if (code == 0 || code == 9) {
          Extras.checkout.util.redirect(Extras.checkout.resources.cart);
        } else {
          Extras.checkout.util.showErrorMessage(code);
        }
      }
    },
    util: {
      updateSelects: function () {
        $(".select-m").remove();
        customSelect();
      },
      loadData: function (resource, parameters, callback, async) {
        if (typeof async == "undefined") async = true;

        $.ajax(resource, {
          cache: false,
          data: parameters,
          timeout: 10000,
          type: "GET",
          error: function (XMLHttpRequest, textStatus, errorThrown) {
            Extras.checkout.util.showErrorMessage(15);
            console.log("Data loading error:");
            console.log(XMLHttpRequest);
            console.log(textStatus);
            console.log(errorThrown);
          },
          async: async,
          success: function (response) {
            // code 3 - POS setting error
            if (response.result != "ERROR" || response.code == 3) {
              callback(response);
            } else {
              Extras.checkout.actions.handleError(response);
            }

          }
        });
      },
      showPopup: function ($itemToShow, openCallback, closeCallback) {
        $.magnificPopup.open({
          items: {
            src: $itemToShow
          },
          type: 'inline',
          callbacks: {
            open: openCallback,
            close: closeCallback
          }
        });
      },
      closePopup: function () {
        $.magnificPopup.close();
      },
      redirect: function (url) {
        window.location.href = url;
      },
      showErrorMessage: function (code) {
        $("#errorMessage").html($("#checkoutExceptionTemplate_" + code).html()).append('<div class="btn bg-green mfp-close popup-close">ОК</div>');
        $("#errorMessage").show();
        Extras.checkout.util.showPopup($("#errorMessage"), {}, function () {
          $("#errorMessage").hide();
        });

      },
      onActionComplete: function (name, callback) {
        var eventName = "action_" + name + "_completed";
        $(document).bind(eventName, function () {
          $(document).unbind(eventName);
          callback();
        });
      }
    }
  },

  // =====================================================

  popupErrorCount: function() {
    $.magnificPopup.open({
      items: {
        src: '#addToCartLayer'
      },
      type: 'inline',
      fixedContentPos: false,
      fixedBgPos: true,
      overflowY: 'auto',
      closeBtnInside: true,
      preloader: false,
      midClick: true,
      removalDelay: 300,
      mainClass: 'my-mfp-slide-bottom',
      callbacks: {
        open: function() {
          setTimeout(function() {
            $.magnificPopup.close();
          }, 5000);
        },
        close: function() {
          $('#addToCartLayer').remove();
        }
      }
    });
  },

  // Functions for top navigation
  options: {
    flag: false,
    containerWidth: 1140,
    widthSub: 270,
    widthScreen: document.body.clientWidth
  },
  topMenu: function () {
    if (this.options.flag) return;
    var items = document.querySelectorAll('.top-menu__item');
    for (var i = 0, len = items.length; i < len; i++) {
      var submenu = items[i].querySelector('.submenu');
      if (submenu) {
        if (this.checkWidth(items[i])) submenu.style.right = '0';
      }
    }
    this.options.flag = true;
  },
  checkWidth: function (elem) {
    var pos = $(elem).position();
    var rightPos = this.options.containerWidth - pos.left;
    return (rightPos < this.options.widthSub);
  },
  // END of Functions for top navigation

  // На главной верхний слайдер
  topSlider: function (container) {
    new Swiper(container, {
      loop: true,
      slidesPerView: 1,
      autoplay: 3000,
      pagination: '.swiper-pagination',
      paginationClickable: true,
      preloadImages: false,
      //lazyLoading: true,
      simulateTouch: false
      //width: 870
    });
  },

  // На главной 3 слайдера
  productSlider: function (spaceBetween, slidesPerView, slidesPerView960) {
    var sliders = document.querySelectorAll('[data-slider=big-slider]');
    [].forEach.call(sliders, function (item, i) {
      var slider = new Swiper(item, {
        loop: true,
        slidesPerView: slidesPerView,
        spaceBetween: spaceBetween,
        prevButton: $(item).parent().find('.swiper-prev'),
        nextButton: $(item).parent().find('.swiper-next'),
        simulateTouch: false,
        breakpoints: {
          960: {
            slidesPerView: slidesPerView960,
            spaceBetween: 15
          },
          768: {
            slidesPerView: 3,
            spaceBetween: 15
          },
          640: {
            slidesPerView: 2,
            spaceBetween: 15
          },
          480: {
            slidesPerView: 2,
            spaceBetween: 10
          }
        }
      });
    });
  },

  // Маленький слайдер сопутствующих товаров
  productSliderSmall: function (container, prev, next, slidesCount, spaceBetween) {
    var container = document.querySelector(container);
    var $slides = $(container).find('.swiper-slide');
    var $arrows = $(container).find('.arrows');


    if($slides.length > 3) {
      new Swiper(container, {
        loop: true,
        slidesPerView: slidesCount,
        spaceBetween: spaceBetween,
        prevButton: prev,
        nextButton: next,
        simulateTouch: false,
        breakpoints: {
          960: {
            slidesPerView: 2
          },
          640: {
            slidesPerView: 1
          }
        }
      });
    } else {
      $arrows.hide();
    }

    if((Extras.options.widthScreen <= 960 && $slides.length === 2) || (Extras.options.widthScreen <= 960 && $slides.length >=3)) {
      new Swiper(container, {
        loop: true,
        slidesPerView: 2,
        spaceBetween: spaceBetween,
        prevButton: prev,
        nextButton: next,
        simulateTouch: false,
        breakpoints: {
          640: {
            slidesPerView: 1
          }
        }
      });
      $arrows.show();
    }

    if(Extras.options.widthScreen <= 640) {
      new Swiper(container, {
        loop: true,
        slidesPerView: 1,
        spaceBetween: spaceBetween,
        prevButton: prev,
        nextButton: next,
        simulateTouch: false
      });
      $arrows.show();
    }

  },

  // В карточке товаров слайдер с изображениями товара
  productCardSlider: function () {

    var galleryTop = new Swiper('.gallery-top', {
      spaceBetween: 10,
      effect: 'fade',
    });
    var galleryThumbs = new Swiper('.gallery-thumbs', {
      centeredSlides: true,
      slidesPerView: 'auto',
      touchRatio: 0.2,
      slideToClickedSlide: true,
      virtualTranslate: true,
    });
    galleryTop.params.control = galleryThumbs;
    galleryThumbs.params.control = galleryTop;

    if (this.options.widthScreen > 1170) {
      $('.product-card__left-box_pic').magnificPopup({
        delegate: 'a',
        type: 'image',
        fixedContentPos: false,
        //verticalFit: true,
        gallery:{enabled:true},

        callbacks: {
          open: function() {
            //Extras.fixedHeaderPanel();
          },
          close: function() {

          }
        }
      });

      $('.product-card__left-box_thumbs').magnificPopup({
        delegate: 'a',
        type: 'image'
      });
    }
    else {
      $(".product-card__left-box_pic").find("a").on("click", function(e) {
        e.preventDefault();
      })
    }

  },

  // В карточке товаров вкладки
  productCardTabs: function () {
    var $titles = $('.product-card__tabs-box_titles > li > a');
    $titles.on('click', function (e) {
      e.preventDefault();
      $titles.parent().removeClass('active');
      $(this).parent().addClass('active');
      var tab = $(this).attr('href');
      $('.product-card__tabs-box_content').not(tab).hide();
      $(tab).show();
    });
  },

  // В карточке товара свернуть описание
  hideDescription: function(descrWrap, btnWrap, textSize) {
    var $descr = $(descrWrap);
    var $btnEl = $('<div/>', {'class': btnWrap});
    var $link = $('<a href="#" class="down">Показать полное описание</a>');
    var $btn = $btnEl.append($link);

    var text = $descr.html();
    var trimedText = text.slice(0, textSize) + '...';

    if(text.length > textSize) {
      $descr.html(trimedText).addClass('short');
      $descr.after($btn);
      $btn.on('click', function(e) {
        e.preventDefault();
        var $button = $(this).find('a');
        if($descr.hasClass('short')) {
          $descr.html(text);
          $descr.removeClass('short');
          $button.removeClass('down').addClass('up');
          $button.text('Свернуть описание');
        } else {
          $descr.html(trimedText);
          $descr.addClass('short');
          $button.removeClass('up').addClass('down');
          $button.text('Показать полное описание');
        }
      });
    }
  },

  // Позиция для расхлопа
  bigBannerToggle: function () {
    var elem = $('.big-banner');
    var content = elem.find('.big-banner__content');
    elem.mouseover(function () {
      content.slideDown(300);
    }).mouseleave(function () {
      content.slideUp(300);
    });
  },


  // БРЕНДЗОНА
  // В брендзоне слайдер со списками брендов
  lettersSlider: function (container, items, slidesCount, mousewheelControl) {
    var slider = new Swiper(container, {
      spaceBetween: 20,
      slidesPerView: slidesCount,
      //slidesPerGroup: 2,
      prevButton: $('.swiper-prev'),
      nextButton: $('.swiper-next'),
      simulateTouch: false,
      mousewheelControl: mousewheelControl
    });

    $(items).each(function (i, item) {
      var mainLetterName = $(container).find('.swiper-slide-active span').text();
      var letterName = $(item).find('i').text();
      if (letterName === mainLetterName) {
        $(item).addClass('active');
      } else {
        $(item).removeClass('active');
      }
    });

    $(items).on('click', function () {
      slider.slideTo($(this).index(), 200);
      $(items).removeClass('active');
      $(this).addClass('active');
    });
  },

  // В мобильной версии навигация по буквам
  navigateByLetters: function (letters, targets, marginTop) {
    var letters = $(letters).find('[data-href]');
    var targets = $(targets).find('[data-name]');
    letters.each(function (i, item) {
      $(item).on('click', function () {
        for (var i = 0; i < targets.length; i++) {
          if ($(item).text() == $(targets[i]).text()) {
            window.scrollTo(0, targets[i].offsetTop - marginTop);
          }
        }
      });
    });
  },


  // MOBILE FUNCTIONS

  // Мобильное меню
  mobileMenu: function () {
    var menuEl = document.querySelector('.main-nav-mobile'),
        mlmenu = new MLMenu(menuEl, {
          backCtrl: true,
          // itemsDelayInterval : 60, // delay between each menu item sliding animation
          onItemClick: function () {
            console.log('click');
          }
        });
  },
  mobileMenuToggle: function (btn, el, className, speed) {
    btn = $(btn);
    el = $(el);
    btn.on('click', function (e) {
      e.preventDefault();
      $(el).slideToggle(speed);
      $([btn, el]).toggleClass(className);
    });
  },
  mobileToggle: function (elem) {
    $(elem).on('click', function (e) {
      e.preventDefault();
      $(this).toggleClass('visible');
    });
  },
  mobileSubmenu: function() {
    $('.list__sub').removeClass('animated fadeInRight').hide();
    $('.list .dropdown .arr').on('click', function (e) {
      e.preventDefault();
      e.stopPropagation();
      if ($(this).parent().next('ul').length > 0) {
        e.preventDefault();
        $(this).parent().next('ul').stop(true, true).slideToggle();
        $(this).toggleClass('minus');
      }
    });
  },

  // В листинге сортировка в мобильном
  mobileSort: function (btn, container) {
    btn = $(btn);
    container = $(container);
    btn.on('click', function () {
      container.show();
      var overlay = $('<div/>', {'class': 'sort-overlay'}).prependTo('body');
      overlay.on('click', function () {
        $(this).remove();
        container.hide();
      });
    });
  },

  // В листинге фильтр в мобильном
  mobileFilter: function (btn, container, close) {
    btn = $(btn);
    container = $(container);
    close = $(close);
    btn.on('click', function () {
      container.removeClass('zoomOut').addClass('zoomIn').show();
      setTimeout(function () {
        $('body').css({'position': 'fixed'});
      }, 200);
    });
    close.on('click', function () {
      container.removeClass('zoomIn').addClass('zoomOut');
      //setTimeout(function() {
      container.hide();
      //}, 200);
      $('body').css({'position': 'static'});
    });
  },

  // Login click in header
  showLoginPopup: function (btn, popup, overlayContainer) {
    btn = $(btn);
    popup = $(popup);
    overlayContainer = $(overlayContainer);
    var overlay = $('<div/>', {'class': 'overlay animated fadeIn'});
    btn.on('click', function (e) {
      e.preventDefault();
      if(popup.is(':visible')) return;
      overlayContainer.prepend(overlay);
      popup.show();
      overlay.on('click', function () {
        $(this).remove();
        popup.hide();
      });
    });
  },

  // Submenu in sidebar
  showSidebarSubmenu: function () {

    var leftMenuColumnWidth = $('.list__column').width();
    var $menu = $('.sb-nav .list');
    var $items = $('.sb-nav .list__sub.first');

    // Menu aim
    $menu.menuAim({
      activate: activateSubmenu,
      deactivate: deactivateSubmenu,
      exitMenu: function() {
        $items.css('display', 'none');
        //$menu.find('li').removeClass("maintainHover");
      }
    });

    $('.list__item > .list__sub').each(function () {
      var column = $(this).find('.list__column').length;
      var newWidth = leftMenuColumnWidth * column;
      $(this).css('width', newWidth + 60 + 'px');
    });

    function activateSubmenu(row) {
      var $row = $(row),
          submenuId = $row.data("submenuId"),
          $submenu = $("#" + submenuId),
          height = $menu.outerHeight(),
          width = $menu.outerWidth();

      // Show the submenu
      $submenu.show();

      // Keep the currently activated row's highlighted look
      $row.addClass("maintainHover");
    }

    function deactivateSubmenu(row) {
      var $row = $(row),
          submenuId = $row.data("submenuId"),
          $submenu = $("#" + submenuId);

      $submenu.hide();
      $row.removeClass("maintainHover");
    }



    /*$items.mouseover(function () {
     var submenu = $(this).find('.list__sub').eq(0);
     if (submenu.length > 0) {
     $(this).addClass('active');
     }
     }).mouseleave(function () {
     $(this).removeClass('active');
     });*/

  },

  // Социальные кнопки в карточке товара
  shareSocials: function () {
    var Share = {
      /**
       * Показать пользователю диалог шаринга в сооветствии с опциями
       * Метод для использования в inline-js в ссылках
       * При блокировке всплывающего окна подставит нужный адрес и ползволит браузеру перейти по нему
       *
       * @example <a href="" onclick="return share.go(this)">like+</a>
       *
       * @param Object _element - элемент DOM, для которого
       * @param Object _options - опции, все необязательны
       */
      go: function (_element, _options) {
        var self = Share;
        var options = $.extend(
            {
              type: '', // тип соцсети
              url: location.href, // какую ссылку шарим
              count_url: location.href, // для какой ссылки крутим счётчик
              title: document.title, // заголовок шаринга
              //image: document.getElementsByClassName('img')[0].getAttribute('src'), // картинка шаринга
              text: document.getElementsByClassName('product-card__name')[0].getElementsByTagName('h1')[0].innerText, // текст шаринга
            },
            $(_element).data(), // Если параметры заданы в data, то читаем их
            _options // Параметры из вызова метода имеют наивысший приоритет
        );
        if (self.popup(link = self[options.type](options)) === null) {
          // Если не удалось открыть попап
          if ($(_element).is('a')) {
            // Если это <a>, то подставляем адрес и просим браузер продолжить переход по ссылке
            $(_element).prop('href', link);
            return true;
          }
          else {
            // Если это не <a>, то пытаемся перейти по адресу
            location.href = link;
            return false;
          }
        }
        else {
          // Попап успешно открыт, просим браузер не продолжать обработку
          return false;
        }
      },
      // ВКонтакте
      vk: function (_options) {
        var options = $.extend({
          url: location.href,
          title: document.title,
          image: '',
          text: '',
        }, _options);
        return 'http://vk.com/share.php?'
            + 'url=' + encodeURIComponent(options.url)
            + '&title=' + encodeURIComponent(options.title)
            + '&description=' + encodeURIComponent(options.text)
            + '&image=' + encodeURIComponent(options.image)
            + '&noparse=true';
      },
      // Одноклассники
      ok: function (_options) {
        var options = $.extend({
          url: location.href,
          text: '',
        }, _options);
        return 'http://www.odnoklassniki.ru/dk?st.cmd=addShare&st.s=1'
            + '&st.comments=' + encodeURIComponent(options.text)
            + '&st._surl=' + encodeURIComponent(options.url);
      },
      // Facebook
      fb: function (_options) {
        var options = $.extend({
          url: location.href,
          title: document.title,
          image: '',
          text: '',
        }, _options);
        return 'http://www.facebook.com/sharer.php?s=100'
            + '&p[title]=' + encodeURIComponent(options.title)
            + '&p[summary]=' + encodeURIComponent(options.text)
            + '&p[url]=' + encodeURIComponent(options.url)
            + '&p[images][0]=' + encodeURIComponent(options.image);
      },
      // Живой Журнал
      lj: function (_options) {
        var options = $.extend({
          url: location.href,
          title: document.title,
          text: '',
        }, _options);
        return 'http://livejournal.com/update.bml?'
            + 'subject=' + encodeURIComponent(options.title)
            + '&event=' + encodeURIComponent(options.text + '<br/><a href="' + options.url + '">' + options.title + '</a>')
            + '&transform=1';
      },
      // Твиттер
      tw: function (_options) {
        var options = $.extend({
          url: location.href,
          count_url: location.href,
          title: document.title,
        }, _options);
        return 'http://twitter.com/share?'
            + 'text=' + encodeURIComponent(options.title)
            + '&url=' + encodeURIComponent(options.url)
            + '&counturl=' + encodeURIComponent(options.count_url);
      },
      // Google+
      gg: function (_options) {
        var options = $.extend({
          url: location.href
        }, _options);
        return 'https://plus.google.com/share?url='
            + encodeURIComponent(options.url);
      },
      // Mail.Ru
      mr: function (_options) {
        var options = $.extend({
          url: location.href,
          title: document.title,
          image: '',
          text: '',
        }, _options);
        return 'http://connect.mail.ru/share?'
            + 'url=' + encodeURIComponent(options.url)
            + '&title=' + encodeURIComponent(options.title)
            + '&description=' + encodeURIComponent(options.text)
            + '&imageurl=' + encodeURIComponent(options.image);
      },
      // Открыть окно шаринга
      popup: function (url) {
        return window.open(url, '', 'toolbar=0,status=0,scrollbars=1,width=626,height=436');
      }
    };

    var btn = $('.product-card__socials a');
    btn.on('click', function (e) {
      e.preventDefault();
      console.log('SHARE IT');
      Share.go(this);
    });
  },

  minicartImage: function () {
    var cartImage = $('.header__cart_cart-box_icon');
    var count = parseInt($('.header__cart_cart-box_purchase-num').text(), 10);
    if (count > 0) {
      cartImage.addClass('full-cart');
    } else {
      cartImage.removeClass('full-cart');
    }
  },

  // Количество товара
  countProducts: {
    init: function() {
      this.clickElem();
    },
    clickElem: function() {
      var self = this;
      $('.product__count').find('.minus').on('click', function() {
        self.countMinus();
      });
      $('.product__count').find('.plus').on('click', function() {
        self.countPlus();
      });
    },
    countMinus: function() {
      var input = $('.product__count').find('.qty');
      var amount = +input.val();
      if (input.val() == 1) return;
      input.val(amount - 1);
    },
    countPlus: function() {
      var input = $('.product__count').find('.qty');
      var amount = +input.val();
      if (input.val() >= 999) return;
      input.val(amount + 1);
    },
  },

  // Popup условия соглашения на станице регистрации
  privacyPopup: function () {
    $('.privacy-agreement__link').magnificPopup({
      type: 'inline'
    });
  },

  // Привязка кнопки КУПИТЬ в товаре
  bindToAddToCartForm: function (componentSelector) {
    //var addToCartForm = $(componentSelector);
    RG.common.ajaxFormBind(componentSelector, '.addToCartButton', {
      success: ACC.product.displayAddToCartPopup
    });
  },

  // Отзывы в карточке товара
  reviews: function() {

    var formValidate = {
      init: function() {
        var hState = this.checkFields().resultHeadline();
        var cState = this.checkFields().resultComment();
        var rState = this.checkFields().resultRating();

        if(hState && cState && rState) {
          console.log('Форма отправлена');
          return true;
        } else {
          console.log('Форма не отправлена');
        }

      },
      errMsg: document.querySelector('.review_error-msg'),
      getFields: function() {
        return {
          headlineField: {
            node: document.querySelector('#reviewForm [name=headline]'),
            state: false
          },
          commentField: {
            node: document.querySelector('#reviewForm [name=comment]'),
            state: false
          },
          ratingFields: {
            node: document.querySelectorAll('input[name=rating]'),
            state: false
          }
        };
      },
      checkFields: function() {
        var self = this;
        return {
          resultHeadline: function() {
            var headline = self.getFields().headlineField;
            if(headline.node.value.length > 1) {
              self.errMsg.innerHTML = '';
              headline.node.style.borderColor = '#a1a1a1';
              headline.state = true;
            } else {
              headline.state = false;
              self.errMsg.innerHTML = 'Пожалуйста, заполните обязательные поля (не менее двух символов)';
              headline.node.style.borderColor = '#cd097d';
            }
            return headline.state;
          },
          resultComment: function() {
            var comment = self.getFields().commentField;
            if(comment.node.value.length > 1) {
              self.errMsg.innerHTML = '';
              comment.node.style.borderColor = '#a1a1a1';
              comment.state = true;
            } else {
              comment.state = false;
              self.errMsg.innerHTML = 'Пожалуйста, заполните обязательные поля (не менее двух символов)';
              comment.node.style.borderColor = '#cd097d';
            }
            return comment.state;
          },
          resultRating: function() {
            var ratings = self.getFields().ratingFields.node;

            for(var i = 0; i < ratings.length; i++) {
              if(ratings[i].checked) {
                self.errMsg.innerHTML = '';
                ratings.state = true;
                break;
              } else {
                ratings.state = false;
                self.errMsg.innerHTML = 'Пожалуйста, заполните обязательные поля (не менее двух символов)';
              }
            }
            return ratings.state;
          }
        };
      }
    };


    var submitBtn = $('#reviewForm button[type=submit]'),
        preloader = $('.preloader');

    submitBtn.on('click', function(e) {
      e.preventDefault();

      if(formValidate.init()) {

        var alias = $('#reviewForm [name=alias]'),
            rating = $('input[name=rating]:checked');

        $.ajax({
          url: window.location.pathname + '/review',
          type: 'get',
          data: {
            alias: alias.val(),
            headline: formValidate.getFields().headlineField.node.value,
            comment: formValidate.getFields().commentField.node.value,
            rating: rating.val()
          },
          beforeSend: function() {
            preloader.show();
          }
        }).done(function(result) {
          preloader.hide();
          if(result) {
            $.magnificPopup.open({
              items: {
                src: '.review-result-popup'
              },
              type: 'inline',
              fixedContentPos: false,
              fixedBgPos: true,
              overflowY: 'auto',
              closeBtnInside: true,
              preloader: false,
              midClick: true,
              removalDelay: 300,
              mainClass: 'my-mfp-slide-bottom',
              callbacks: {
                open: function() {
                  setTimeout(function() {
                    $.magnificPopup.close();
                  }, 4000);
                }
              }
            });

            alias.val('');
            formValidate.getFields().headlineField.node.value = '';
            formValidate.getFields().commentField.node.value = '';
            //rating.prop('checked', false);
          } else {
            console.log('Отзыв не отправлен');
            formValidate.errMsg = 'Произошла ошибка, попробуйте еще раз';
          }
        }).fail(function(err) {
          console.log('Ajax error: ' + err);
        });

      }

    });
  },

  checkoutTermsAndCond: function() {
    var termsConditionsCheckbox = $('#terms_conditions');
    termsConditionsCheckbox.on('change', function () {
      var val = termsConditionsCheckbox.prop('checked');
      var button = $('#terms_conditions_button');
      if (val) {
        button.removeAttr('disabled');
      }
      else {
        button.attr('disabled', '');
      }
    });
    $('.termsAndConditionsLink').magnificPopup({
      type: 'ajax'
    });
  },

  fixedHeaderPanel: {
    options: {
      header: $('header'),
      topNav: $('.top-nav'),
      search: $('.header__search > .siteSearch'),
      searchInput: $('.header__search .siteSearchInput'),
      closeSearch: $('.header__search .close-search'),
      searchBtn: $('.search-toggle-btn'),
      mainWrap: $('main'),
      isAppended: false
    },
    init: function() {
      Extras.topMenu();
      this.setFixedHeader(74);
    },
    searchToggle: function(btn) {
      var _ = this.options;

      $(btn).on('click', function() {
        _.topNav.css('opacity',0);
        _.search.show();
        _.searchInput.addClass('active').focus();
        $(this).css('opacity',0);
        _.closeSearch.fadeIn(300);
      });

      _.closeSearch.on('click', function() {
        $(this).fadeOut(300);
        _.searchInput.removeClass('active');
        _.topNav.css('opacity',1);
        _.searchBtn.css('opacity',1);
        _.search.hide();
      });
    },
    setFixedHeader: function(height) {
      var _ = this.options;

      if ($(window).scrollTop() > height && !_.isAppended) {
        if(!Extras.resizeWindow) return;
        _.header.addClass('fixed');
        _.topNav.insertAfter($('.header__logo-box'));
        _.mainWrap.css('padding-top', '123px');
        _.search.hide();
        this.searchToggle('.search-toggle-btn');
        _.searchBtn.css('opacity',1);
        _.isAppended = true;
      } else if($(window).scrollTop() <= height && _.isAppended) {
        _.header.removeClass('fixed');
        _.topNav.insertAfter($('.header .top-section'));
        _.mainWrap.css('padding-top', '0');
        _.topNav.css('opacity',1);
        _.search.show();
        _.closeSearch.hide();
        _.searchInput.removeClass('active');
        _.isAppended = false;
      }
    }
  },

  mobileSearch: function(selector, searchWrapper, searchInput, closeBtn) {
    selector = $(selector);
    searchWrapper = $(searchWrapper);
    searchInput = $(searchInput);
    closeBtn = $(closeBtn);
    var mainNavMobile = $('.main-nav-mobile');
    selector.on('click', function(e) {
      e.preventDefault();
      if(mainNavMobile.hasClass('nav-is-visible')) {
        mainNavMobile.removeClass('nav-is-visible');
        mainNavMobile.fadeOut(200);
      }
      searchWrapper.addClass('active');
      searchInput.focus();
    });
    closeBtn.on('click', function(e) {
      e.preventDefault();
      searchWrapper.removeClass('active');
      searchInput.val('');
    });
  },



  showHideListing: function () {
    // Для всех брендзон
    var section1 = $('.section1');
    var listing = $('.listing'),
        facets = $('.facets'),
        mobileFilter = $('.mobile-filter-section');

    console.log('BRAND ZONE');

    if (section1.find('.category-description').length > 0) {

      if (section1.find('.category-description').find('div').html().length > 0) {
        listing.hide();
        facets.hide();
        mobileFilter.hide();
      } else {
        if (Extras.options.widthScreen <= 1170) {
          listing.show();
        } else {
          listing.show();
          facets.show();
        }
      }

    }

    // Для shiseido
    var shiseido = $('.shiseido');

    if (shiseido.length > 0) {
      listing.hide();
      facets.hide();
      mobileFilter.hide();
    }

  }

};


$(document).ready(function() {
  Extras.init();
});