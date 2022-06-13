import 'dart:convert';

import 'package:day34/animation/FadeAnimation.dart';
import 'package:day34/models/circuit.dart';
import 'package:day34/models/event.dart';
import 'package:day34/models/product.dart';
import 'package:day34/pages/circuit_view.dart';
import 'package:day34/pages/event_view.dart';
import 'package:day34/pages/hotel_view.dart';
import 'package:day34/pages/payment.dart';
import 'package:day34/pages/product_view.dart';
import 'package:day34/pages/search.dart';
import 'package:day34/pages/voyage_view.dart';
import 'package:dotted_border/dotted_border.dart';
import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'package:flutter_slidable/flutter_slidable.dart';

import '../models/hotel.dart';
import '../models/voyage.dart';

class ResultatPage extends StatefulWidget {
  List<dynamic> data;
  String type;
  ResultatPage({Key? key, required this.data, required this.type})
      : super(key: key);

  @override
  _ResultatPageState createState() => _ResultatPageState();
}

class _ResultatPageState extends State<ResultatPage>
    with TickerProviderStateMixin {
  late List<dynamic> cartItems = [];
  List<int> cartItemCount = [1, 1, 1, 1, 1, 1];
  int totalPrice = 0;

  Future<void> fetchItems() async {
    final String response = await rootBundle.loadString('assets/products.json');
    final data = await json.decode(response);
    if (widget.type == "Circuit") {
      cartItems = widget.data.map((data) => Circuit.fromJson(data)).toList();
    } else if (widget.type == "Hotel") {
      cartItems = widget.data.map((data) => Hotel.fromJson(data)).toList();
    } else if (widget.type == "Evenement") {
      cartItems = widget.data.map((data) => Event.fromJson(data)).toList();
    } else {
      cartItems = widget.data.map((data) => Voyage.fromJson(data)).toList();
    }

    // sumTotal();
  }

  // sumTotal() {
  //   cartItems.forEach((item) {
  //     totalPrice = item.price + totalPrice;
  //   });
  // }

  @override
  void initState() {
    // TODO: implement initState
    super.initState();
    print(widget.data);
    fetchItems().whenComplete(() => setState(() {}));
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: AppBar(
          elevation: 0,
          backgroundColor: Colors.transparent,
          title: Text('Résultat', style: TextStyle(color: Colors.black)),
        ),
        body: Column(crossAxisAlignment: CrossAxisAlignment.start, children: <
            Widget>[
          Container(
            padding: EdgeInsets.symmetric(horizontal: 20),
            height: MediaQuery.of(context).size.height * 0.53,
            child: cartItems.length > 0
                ? FadeAnimation(
                    1.4,
                    AnimatedList(
                        scrollDirection: Axis.vertical,
                        initialItemCount: cartItems.length,
                        itemBuilder: (context, index, animation) {
                          return Slidable(
                              actionPane: SlidableDrawerActionPane(),
                              secondaryActions: [
                                MaterialButton(
                                  color: Colors.red.withOpacity(0.15),
                                  elevation: 0,
                                  height: 60,
                                  minWidth: 60,
                                  // shape: CircleBorder(),
                                  // child: Icon(
                                  //   Icons.delete,
                                  //   color: Colors.red,
                                  //   size: 30,
                                  // ),
                                  onPressed: () {
                                    setState(() {
                                      /* totalPrice = totalPrice -
                                        (int.parse(cartItems[index]
                                                .price
                                                .toString()) *
                                            cartItemCount[index]);*/
                                      widget.type == "Circuit"
                                          ? AnimatedList.of(context).removeItem(
                                              index, (context, animation) {
                                              return cartItemCircuit(
                                                  cartItems[index],
                                                  index,
                                                  animation);
                                            })
                                          : widget.type == "Evenement"
                                              ? AnimatedList.of(context)
                                                  .removeItem(index,
                                                      (context, animation) {
                                                  return cartItemEvent(
                                                      cartItems[index],
                                                      index,
                                                      animation);
                                                })
                                              : widget.type == "Voyage"
                                                  ? AnimatedList.of(context)
                                                      .removeItem(index,
                                                          (context, animation) {
                                                      return cartItemVoyage(
                                                          cartItems[index],
                                                          index,
                                                          animation);
                                                    })
                                                  : AnimatedList.of(context)
                                                      .removeItem(index,
                                                          (context, animation) {
                                                      return cartItemHotel(
                                                          cartItems[index],
                                                          index,
                                                          animation);
                                                    });

                                      // cartItems.removeAt(index);
                                      // cartItemCount.removeAt(index);
                                    });
                                  },
                                ),
                              ],
                              child: widget.type == "Circuit"
                                  ? cartItemCircuit(
                                      cartItems[index], index, animation)
                                  : widget.type == "Evenement"
                                      ? cartItemEvent(
                                          cartItems[index], index, animation)
                                      : widget.type == "Voyage"
                                          ? cartItemVoyage(cartItems[index],
                                              index, animation)
                                          : cartItemHotel(cartItems[index],
                                              index, animation));
                        }),
                  )
                : Container(),
          ),
          SizedBox(height: 30),
          // FadeAnimation(
          //   1.2,
          //   Container(
          //     padding: EdgeInsets.symmetric(horizontal: 20),
          //     child: Row(
          //       mainAxisAlignment: MainAxisAlignment.spaceBetween,
          //       children: <Widget>[
          //         Text('Shipping', style: TextStyle(fontSize: 20)),
          //         Text('\D5.99',
          //             style:
          //                 TextStyle(fontSize: 20, fontWeight: FontWeight.bold))
          //       ],
          //     ),
          //   ),
          // ),
          FadeAnimation(
              1.3,
              Padding(
                padding: EdgeInsets.all(20.0),
                child: DottedBorder(
                    color: Color.fromARGB(255, 255, 255, 255),
                    dashPattern: [10, 10],
                    padding: EdgeInsets.all(0),
                    child: Container()),
              )),
          // FadeAnimation(
          //     1.3,
          // Container(
          //   padding: EdgeInsets.symmetric(horizontal: 20),
          //   child: Row(
          //     mainAxisAlignment: MainAxisAlignment.spaceBetween,
          //     children: <Widget>[
          //       Text('Total', style: TextStyle(fontSize: 20)),
          //       Text('\D${totalPrice + 5.99}',
          //           style: TextStyle(
          //               fontSize: 20, fontWeight: FontWeight.bold))
          //     ],
          //   ),
          // )),
          // SizedBox(height: 10),
          FadeAnimation(
              1.4,
              Padding(
                padding: EdgeInsets.all(20.0),
                child: MaterialButton(
                  onPressed: () {
                    Navigator.push(context,
                        MaterialPageRoute(builder: (context) => SearchPage()));
                  },
                  height: 50,
                  elevation: 0,
                  splashColor: Colors.yellow[700],
                  shape: RoundedRectangleBorder(
                      borderRadius: BorderRadius.circular(10)),
                  color: Colors.yellow[800],
                  child: Center(
                    child: Text(
                      "Modifier la recherche",
                      style: TextStyle(color: Colors.white, fontSize: 18),
                    ),
                  ),
                ),
              ))
        ]));
  }

  cartItem(Product product, int index, animation) {
    return GestureDetector(
      onTap: () {
        Navigator.push(
            context,
            MaterialPageRoute(
                builder: (context) => ProductViewPage(product: product)));
      },
      child: SlideTransition(
        position: Tween<Offset>(begin: const Offset(-1, 0), end: Offset.zero)
            .animate(animation),
        child: Container(
          margin: EdgeInsets.only(bottom: 20),
          padding: EdgeInsets.symmetric(horizontal: 10),
          decoration: BoxDecoration(
            color: Color.fromARGB(255, 255, 255, 255),
            borderRadius: BorderRadius.circular(10),
            boxShadow: [
              BoxShadow(
                color: Colors.grey.shade200,
                offset: Offset(0, 2),
                blurRadius: 6,
              ),
            ],
          ),
          child: Row(children: <Widget>[
            Container(
              margin: EdgeInsets.only(right: 10),
              child: ClipRRect(
                borderRadius: BorderRadius.circular(10),
                child: Image.network(
                  product.imageURL,
                  fit: BoxFit.cover,
                  height: 100,
                  width: 100,
                ),
              ),
            ),
            Expanded(
              child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: <Widget>[
                    Text(
                      product.brand,
                      style: TextStyle(
                        color: Colors.orange.shade400,
                        fontSize: 14,
                      ),
                    ),
                    SizedBox(
                      height: 5,
                    ),
                    Text(
                      product.name,
                      style: TextStyle(
                        fontSize: 18,
                        fontWeight: FontWeight.w600,
                      ),
                    ),
                    SizedBox(height: 15),
                    Text(
                      '${product.price}\Dt',
                      style: TextStyle(
                        fontSize: 20,
                        color: Colors.grey.shade800,
                      ),
                    ),
                    SizedBox(height: 10),
                  ]),
            ),
            Column(
              crossAxisAlignment: CrossAxisAlignment.center,
              children: [
                // MaterialButton(
                //   minWidth: 10,
                //   padding: EdgeInsets.all(0),
                //   onPressed: () {
                //     setState(() {
                //       if (cartItemCount[index] > 1) {
                //         cartItemCount[index]--;
                //         totalPrice = totalPrice - product.price;
                //       }
                //     });
                //   },
                //   shape: CircleBorder(),
                //   child: Icon(
                //     Icons.remove_circle_outline,
                //     color: Color.fromARGB(255, 203, 36, 36),
                //     size: 30,
                //   ),
                // ),
                // Container(
                //   child: Center(
                //     child: Text(
                //       cartItemCount[index].toString(),
                //       style: TextStyle(
                //           fontSize: 20,
                //           color: Color.fromARGB(255, 141, 49, 49)),
                //     ),
                //   ),
                // ),
                // MaterialButton(
                //   padding: EdgeInsets.all(0),
                //   minWidth: 10,
                //   splashColor: Colors.yellow[700],
                //   onPressed: () {
                //     setState(() {
                //       cartItemCount[index]++;
                //       totalPrice = totalPrice + product.price;
                //     });
                //   },
                //   shape: CircleBorder(),
                //   child: Icon(
                //     Icons.add_circle,
                //     size: 30,
                //   ),
                // ),
              ],
            ),
          ]),
        ),
      ),
    );
  }

  Widget cartItemCircuit(
      Circuit circuit, int index, Animation<double> animation) {
    return GestureDetector(
      onTap: () {
        Navigator.push(
            context,
            MaterialPageRoute(
                builder: (context) => CircuitViewPage(
                      circuit: circuit,
                    )));
      },
      child: SlideTransition(
        position: Tween<Offset>(begin: const Offset(-1, 0), end: Offset.zero)
            .animate(animation),
        child: Container(
          margin: EdgeInsets.only(bottom: 20),
          padding: EdgeInsets.symmetric(horizontal: 10),
          decoration: BoxDecoration(
            color: Color.fromARGB(255, 255, 255, 255),
            borderRadius: BorderRadius.circular(10),
            boxShadow: [
              BoxShadow(
                color: Colors.grey.shade200,
                offset: Offset(0, 2),
                blurRadius: 6,
              ),
            ],
          ),
          child: Row(children: <Widget>[
            Container(
              margin: EdgeInsets.only(right: 10),
              child: ClipRRect(
                borderRadius: BorderRadius.circular(10),
                child: Image.network(
                  circuit.image,
                  fit: BoxFit.cover,
                  height: 100,
                  width: 100,
                ),
              ),
            ),
            Expanded(
              child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: <Widget>[
                    Text(
                      circuit.nbjours,
                      style: TextStyle(
                        color: Colors.orange.shade400,
                        fontSize: 14,
                      ),
                    ),
                    SizedBox(
                      height: 5,
                    ),
                    Text(
                      circuit.name,
                      style: TextStyle(
                        fontSize: 18,
                        fontWeight: FontWeight.w600,
                      ),
                    ),
                    SizedBox(height: 15),
                    Text(
                      '${circuit.prix}\Dt',
                      style: TextStyle(
                        fontSize: 20,
                        color: Colors.grey.shade800,
                      ),
                    ),
                    SizedBox(height: 10),
                  ]),
            ),
            Column(
              crossAxisAlignment: CrossAxisAlignment.center,
              children: [],
            ),
          ]),
        ),
      ),
    );
  }

  Widget cartItemEvent(Event event, int index, Animation<double> animation) {
    return GestureDetector(
      onTap: () {
        Navigator.push(
            context,
            MaterialPageRoute(
                builder: (context) => EventViewPage(
                      event: event,
                    )));
      },
      child: SlideTransition(
        position: Tween<Offset>(begin: const Offset(-1, 0), end: Offset.zero)
            .animate(animation),
        child: Container(
          margin: EdgeInsets.only(bottom: 20),
          padding: EdgeInsets.symmetric(horizontal: 10),
          decoration: BoxDecoration(
            color: Color.fromARGB(255, 255, 255, 255),
            borderRadius: BorderRadius.circular(10),
            boxShadow: [
              BoxShadow(
                color: Colors.grey.shade200,
                offset: Offset(0, 2),
                blurRadius: 6,
              ),
            ],
          ),
          child: Row(children: <Widget>[
            Container(
              margin: EdgeInsets.only(right: 10),
              child: ClipRRect(
                borderRadius: BorderRadius.circular(10),
                child: Image.network(
                  event.image,
                  fit: BoxFit.cover,
                  height: 100,
                  width: 100,
                ),
              ),
            ),
            Expanded(
              child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: <Widget>[
                    Text(
                      event.date.toString(),
                      style: TextStyle(
                        color: Colors.orange.shade400,
                        fontSize: 14,
                      ),
                    ),
                    SizedBox(
                      height: 5,
                    ),
                    Text(
                      event.name,
                      style: TextStyle(
                        fontSize: 18,
                        fontWeight: FontWeight.w600,
                      ),
                    ),
                    SizedBox(height: 15),
                    Text(
                      '${event.prix}\Dt',
                      style: TextStyle(
                        fontSize: 20,
                        color: Colors.grey.shade800,
                      ),
                    ),
                    SizedBox(height: 10),
                  ]),
            ),
            Column(
              crossAxisAlignment: CrossAxisAlignment.center,
              children: [],
            ),
          ]),
        ),
      ),
    );
  }

  Widget cartItemVoyage(Voyage voyage, int index, Animation<double> animation) {
    return GestureDetector(
      onTap: () {
        Navigator.push(
            context,
            MaterialPageRoute(
                builder: (context) => VoyageViewPage(
                      voyage: voyage,
                    )));
      },
      child: SlideTransition(
        position: Tween<Offset>(begin: const Offset(-1, 0), end: Offset.zero)
            .animate(animation),
        child: Container(
          margin: EdgeInsets.only(bottom: 20),
          padding: EdgeInsets.symmetric(horizontal: 10),
          decoration: BoxDecoration(
            color: Color.fromARGB(255, 255, 255, 255),
            borderRadius: BorderRadius.circular(10),
            boxShadow: [
              BoxShadow(
                color: Colors.grey.shade200,
                offset: Offset(0, 2),
                blurRadius: 6,
              ),
            ],
          ),
          child: Row(children: <Widget>[
            Container(
              margin: EdgeInsets.only(right: 10),
              child: ClipRRect(
                borderRadius: BorderRadius.circular(10),
                child: Image.network(
                  voyage.image,
                  fit: BoxFit.cover,
                  height: 100,
                  width: 100,
                ),
              ),
            ),
            Expanded(
              child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: <Widget>[
                    Text(
                      voyage.nbjours,
                      style: TextStyle(
                        color: Colors.orange.shade400,
                        fontSize: 14,
                      ),
                    ),
                    SizedBox(
                      height: 5,
                    ),
                    Text(
                      voyage.destination,
                      style: TextStyle(
                        fontSize: 18,
                        fontWeight: FontWeight.w600,
                      ),
                    ),
                    SizedBox(height: 15),
                    Text(
                      '${voyage.prix}\Dt',
                      style: TextStyle(
                        fontSize: 20,
                        color: Colors.grey.shade800,
                      ),
                    ),
                    SizedBox(height: 10),
                  ]),
            ),
            Column(
              crossAxisAlignment: CrossAxisAlignment.center,
              children: [],
            ),
          ]),
        ),
      ),
    );
  }

  Widget cartItemHotel(Hotel hotel, int index, Animation<double> animation) {
    return GestureDetector(
      onTap: () {
        Navigator.push(
            context,
            MaterialPageRoute(
                builder: (context) => HotelViewPage(
                      hotel: hotel,
                    )));
      },
      child: SlideTransition(
        position: Tween<Offset>(begin: const Offset(-1, 0), end: Offset.zero)
            .animate(animation),
        child: Container(
          margin: EdgeInsets.only(bottom: 20),
          padding: EdgeInsets.symmetric(horizontal: 10),
          decoration: BoxDecoration(
            color: Color.fromARGB(255, 255, 255, 255),
            borderRadius: BorderRadius.circular(10),
            boxShadow: [
              BoxShadow(
                color: Colors.grey.shade200,
                offset: Offset(0, 2),
                blurRadius: 6,
              ),
            ],
          ),
          child: Row(children: <Widget>[
            Container(
              margin: EdgeInsets.only(right: 10),
              child: ClipRRect(
                borderRadius: BorderRadius.circular(10),
                child: Image.network(
                  hotel.image,
                  fit: BoxFit.cover,
                  height: 100,
                  width: 100,
                ),
              ),
            ),
            Expanded(
              child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: <Widget>[
                    Text(
                      hotel.nbetoils,
                      style: TextStyle(
                        color: Colors.orange.shade400,
                        fontSize: 14,
                      ),
                    ),
                    SizedBox(
                      height: 5,
                    ),
                    Text(
                      hotel.name,
                      style: TextStyle(
                        fontSize: 18,
                        fontWeight: FontWeight.w600,
                      ),
                    ),
                    SizedBox(height: 15),
                    Text(
                      '${hotel.prix}\Dt',
                      style: TextStyle(
                        fontSize: 20,
                        color: Colors.grey.shade800,
                      ),
                    ),
                    SizedBox(height: 10),
                  ]),
            ),
            Column(
              crossAxisAlignment: CrossAxisAlignment.center,
              children: [],
            ),
          ]),
        ),
      ),
    );
  }
}
