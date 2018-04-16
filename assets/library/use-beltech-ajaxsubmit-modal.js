/**
 * use plugin    : beltech-ajaxsubmit-modal.js
 * develop by    : John Manducdoc.Junsay
 * experise      : Php Magento, Laravel, Codeigniter, wordpress
 * description   :
 * path affected : /beltechnology/orders
 * element       : modal submit
 **/
// 1
$("#1").beltechAjaxsubmitModal({
    alertmsg: 'Request for quotation recieved from client.',
    reload: true,
    imgurl: "<img src='/beltechnology/assets/images/ajax-loader.gif'/> Processing request",
    originaltext: "original-text"
});

// 2, 3
$("#23").beltechAjaxsubmitModal({
    alertmsg: '(PARTIAL/FULL): Request(s) received from supplier(s)',
    statusmsg: 'ORDER DETAILS',
    datatarget: '.order-details',
    reload: true,
    imgurl: "<img src='/beltechnology/assets/images/ajax-loader.gif'/> Processing request",
    originaltext: "original-text"
});

// order details
$("#order-details").beltechAjaxsubmitModal({
    alertmsg: 'Order details has been added',
    statusmsg: 'QUOTE SUP RECEIVED',
    datatarget: '.quote-sup-received',
    reload: true,
    imgurl: "<img src='/beltechnology/assets/images/ajax-loader.gif'/> Processing request",
    originaltext: "original-text"
});

$("#45").beltechAjaxsubmitModal({
    alertmsg: 'Accept quotation request from client',
    statusmsg: 'QUOTE ACCEPTANCE',
    datatarget: '.quote-acceptance',
    reload: true,
    imgurl: "<img src='/beltechnology/assets/images/ajax-loader.gif'/> Processing request",
    originaltext: "original-text"
});

// 6,7,8
$("#678").beltechAjaxsubmitModal({
    alertmsg: 'Upload confirmation supplier doc',
    statusmsg: 'UPLOAD CONFIRMATION SUPPLIER DOC',
    datatarget: '.upload-confirmation-supplier-doc',
    reload: true,
    imgurl: "<img src='/beltechnology/assets/images/ajax-loader.gif'/> Processing request",
    originaltext: "original-text"
});

// 9,10,11,12
$("#9101112").beltechAjaxsubmitModal({
    alertmsg: 'Upload delivery document.',
    statusmsg: '',
    datatarget: '',
    reload: true,
    showMessage: false,
    imgurl: "<img src='/beltechnology/assets/images/ajax-loader.gif'/> Processing request",
    originaltext: "original-text"
});

// 13,14,15
$("#131415").beltechAjaxsubmitModal({
    alertmsg: 'Upload supplier invoice.',
    statusmsg: '',
    datatarget: '',
    reload: true,
    showMessage: false,
    imgurl: "<img src='/beltechnology/assets/images/ajax-loader.gif'/> Processing request",
    originaltext: "original-text"
});