var receiptID = "0351 0021285987";
var receiptQRID = "0351 0021285987";

JsBarcode("#barcode", receiptID, {
  format: "code128",
  width: 1.3,
  height: 30,
  marginLeft: 0,
  displayValue: false
});

var qrcode = new QRCode(document.getElementById("qrcode"), {
  text: "https://gg.bronyhouse.com/r/" + receiptQRID,
  colorDark: "#000000",
  colorLight: "#FFFFFF",
  width: 100,
  height: 100,
  correctLevel: QRCode.CorrectLevel.H
});

var data = {
  "Order ID": "InnROTBVv6FznK81k3m",
  "Order #": 71,
  "Order Name": "Jet Set",
  Location: "BronyCon 2018",
  "Order Date": "2018-06-13T13:05:18-05:00",
  Barcode: "InnROTBVv6FznK81k3m", // Same as Order ID
  Estimate: "2018-06-13T13:25:00-05:00",
  PrintType: "Customer Copy", // This can be anything but typically: Customer Copy, Merchant Copy, Reprint, or Claim Ticket
  Items: [
    {
      Name: "Where There's Trouble",
      Price: 2.0,
      Taxable: true,
      Color: "Yellow",
      "Product Code": "DNC-P01",
      Artist: "DaniCojo",
      Type: "Print",
      Description: "Reg(WS) 11x17 Bordered",
      Quantity: 10
    },
    {
      Name: "Miraculous Ladybug & Cat Noir",
      Price: 1.25,
      Taxable: true,
      Color: "Yellow",
      "Product Code": "DNC-P03",
      Artist: "DaniCojo",
      Type: "Print",
      Description: "Reg(WS) 8.5x11 Borderless",
      Quantity: 10
    }
  ],

  Totals: [
    [null, "Subtotal", 61.25],
    ["0.00%", "Credit Card Fee", 1.68],
    
    "New Section",
    [null, "Total", 62.93],

    "New Section",
    [null, "Tendered"],
    [null, "Change", 62.93]
  ]
};