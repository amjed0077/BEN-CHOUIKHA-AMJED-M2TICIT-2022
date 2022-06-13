import 'dart:convert';

import 'package:day34/models/arrangement.dart';
import 'package:day34/models/circuit.dart';
import 'package:day34/models/hotel.dart';
import 'package:day34/models/product.dart';
import 'package:day34/models/voyage.dart';
import 'package:day34/pages/cart.dart';
import 'package:day34/pages/form.dart';
import 'package:day34/pages/login.dart';
import 'package:flutter/material.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:http/http.dart' as http;

import '../models/event.dart';

class HotelViewPage extends StatefulWidget {
  final Hotel hotel;
  const HotelViewPage({Key? key, required this.hotel}) : super(key: key);

  @override
  _HotelViewPageState createState() => _HotelViewPageState();
}

class _HotelViewPageState extends State<HotelViewPage> {
  List<dynamic> productList = [];
  List<String> size = [
    "15/05",
    "16/05",
    "17/05",
    "18/05",
  ];

  List<String> size1 = [
    "1",
    "2",
    "3",
    "4",
  ];
  List<String> prix = [
    "LPD",
    "DP",
    "PC",
    "All In",
  ];
  List<Color> colors = [
    Colors.black,
    Colors.purple,
    Colors.orange.shade200,
    Colors.blueGrey,
    Color(0xFFFFC1D9),
  ];

  int _selectedColor = 0;
  int _selectedSize = 1;
  int _selectedSize1 = 1;
  int _selectedPrix = 1;
  late bool _isLoading = false;
  String text = "";
  List<Arranegement> ArranegementList = [];
  bool _isVisible = false;
  _ConnectedUser() async {
    SharedPreferences connecter = await SharedPreferences.getInstance();
    setState(() {
      _isLoading = connecter.getBool("token")!;
    });
  }

  @override
  void initState() {
    _ConnectedUser();
    arrangement();
    super.initState();
  }

  Future<void> arrangement() async {
    var response = await http.get(
      Uri.parse('http://127.0.0.1:8000/api/mobile/arrangementss/' +
          widget.hotel.id.toString()),
      headers: <String, String>{
        'Content-Type': 'application/json; charset=UTF-8',
        'Access-Control-Allow-Origin': '*',
      },
    );

    var data = await json.decode(response.body) as List;

    print(data);

    setState(() {
      ArranegementList = data.map((i) => Arranegement.fromJson(i)).toList();
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.white,
      body: CustomScrollView(slivers: [
        SliverAppBar(
          expandedHeight: MediaQuery.of(context).size.height * 0.6,
          elevation: 0,
          snap: true,
          floating: true,
          stretch: true,
          backgroundColor: Colors.grey.shade50,
          flexibleSpace: FlexibleSpaceBar(
              stretchModes: [
                StretchMode.zoomBackground,
              ],
              background: Image.network(
                "http://127.0.0.1:8000/storage/hotels/" + widget.hotel.image,
                fit: BoxFit.cover,
              )),
          bottom: PreferredSize(
              preferredSize: Size.fromHeight(45),
              child: Transform.translate(
                offset: Offset(0, 1),
                child: Container(
                  height: 45,
                  decoration: BoxDecoration(
                    color: Colors.white,
                    borderRadius: BorderRadius.only(
                      topLeft: Radius.circular(30),
                      topRight: Radius.circular(30),
                    ),
                  ),
                  child: Center(
                      child: Container(
                    width: 50,
                    height: 8,
                    decoration: BoxDecoration(
                      color: Colors.grey.shade300,
                      borderRadius: BorderRadius.circular(10),
                    ),
                  )),
                ),
              )),
        ),
        SliverList(
            delegate: SliverChildListDelegate([
          Container(
              height: MediaQuery.of(context).size.height * 0.55,
              color: Colors.white,
              padding: EdgeInsets.symmetric(horizontal: 20, vertical: 5),
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  Row(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    mainAxisAlignment: MainAxisAlignment.spaceBetween,
                    children: [
                      Column(
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: [
                          Text(
                            widget.hotel.name,
                            style: TextStyle(
                              color: Colors.black,
                              fontSize: 22,
                              fontWeight: FontWeight.bold,
                            ),
                          ),
                          SizedBox(
                            height: 5,
                          ),
                          Text(
                            widget.hotel.adresse,
                            style: TextStyle(
                              color: Colors.orange.shade400,
                              fontSize: 14,
                            ),
                          ),
                        ],
                      ),
                      Text(
                        widget.hotel.prix.toString() + "\Dt ",
                        style: TextStyle(color: Colors.black, fontSize: 16),
                      ),
                    ],
                  ),
                  SizedBox(
                    height: 20,
                  ),
                  Text(
                    widget.hotel.description,
                    style: TextStyle(
                      height: 1.5,
                      color: Colors.grey.shade800,
                      fontSize: 15,
                    ),
                  ),
                  Container(
                    height: 60,
                    child: ListView.builder(
                      scrollDirection: Axis.horizontal,
                      itemCount: ArranegementList.length,
                      itemBuilder: (context, index) {
                        return GestureDetector(
                          onTap: () {
                            setState(() {
                              _selectedPrix = index;
                              text =
                                  ArranegementList[index].arrangement_labelle +
                                      " : " +
                                      ArranegementList[index].prix;
                              _isVisible = true;
                            });
                          },
                          child: AnimatedContainer(
                            duration: Duration(milliseconds: 500),
                            margin: EdgeInsets.only(right: 10),
                            decoration: BoxDecoration(
                                color: _selectedPrix == index
                                    ? Colors.yellow[800]
                                    : Colors.grey.shade200,
                                shape: BoxShape.rectangle),
                            width: 40,
                            height: 20,
                            child: Center(
                              child: Text(
                                ArranegementList[index].arrangement_labelle,
                                style: TextStyle(
                                    color: _selectedPrix == index
                                        ? Colors.white
                                        : Colors.black,
                                    fontSize: 15),
                              ),
                            ),
                          ),
                        );
                      },
                    ),
                  ),
                  SizedBox(
                    height: 30,
                  ),
                  Visibility(
                    visible: _isVisible,
                    child: Text(
                      text,
                      style:
                          TextStyle(color: Colors.grey.shade400, fontSize: 18),
                    ),
                  ),
                  Text(
                    "Nombre de personnes",
                    style: TextStyle(color: Colors.grey.shade400, fontSize: 18),
                  ),
                  SizedBox(
                    height: 10,
                  ),
                  // Container(
                  //   height: 60,
                  //   child: ListView.builder(
                  //     scrollDirection: Axis.horizontal,
                  //     itemCount: colors.length,
                  //     itemBuilder: (context, index) {
                  //       return GestureDetector(
                  //         onTap: () {
                  //           setState(() {
                  //             _selectedColor = index;
                  //           });
                  //         },
                  //         child: AnimatedContainer(
                  //           duration: Duration(milliseconds: 300),
                  //           margin: EdgeInsets.only(right: 10),
                  //           decoration: BoxDecoration(
                  //               color: _selectedColor == index
                  //                   ? colors[index]
                  //                   : colors[index].withOpacity(0.5),
                  //               shape: BoxShape.circle),
                  //           width: 40,
                  //           height: 40,
                  //           child: Center(
                  //             child: _selectedColor == index
                  //                 ? Icon(
                  //                     Icons.check,
                  //                     color: Colors.white,
                  //                   )
                  //                 : Container(),
                  //           ),
                  //         ),
                  //       );
                  //     },
                  //   ),
                  // ),
                  Container(
                    height: 60,
                    child: ListView.builder(
                      scrollDirection: Axis.horizontal,
                      itemCount: size1.length,
                      itemBuilder: (context, index) {
                        return GestureDetector(
                          onTap: () {
                            setState(() {
                              _selectedSize1 = index;
                            });
                          },
                          child: AnimatedContainer(
                            duration: Duration(milliseconds: 500),
                            margin: EdgeInsets.only(right: 10),
                            decoration: BoxDecoration(
                                color: _selectedSize1 == index
                                    ? Colors.yellow[800]
                                    : Colors.grey.shade200,
                                shape: BoxShape.circle),
                            width: 40,
                            height: 40,
                            child: Center(
                              child: Text(
                                size1[index],
                                style: TextStyle(
                                    color: _selectedSize1 == index
                                        ? Colors.white
                                        : Colors.black,
                                    fontSize: 15),
                              ),
                            ),
                          ),
                        );
                      },
                    ),
                  ),

                  // SizedBox(
                  //   height: 20,
                  // ),
                  // Text(
                  //   'Size',
                  //   style: TextStyle(color: Colors.grey.shade400, fontSize: 18),
                  // ),
                  // SizedBox(
                  //   height: 10,
                  // ),
                  // Container(
                  //   height: 60,
                  //   child: ListView.builder(
                  //     scrollDirection: Axis.horizontal,
                  //     itemCount: size.length,
                  //     itemBuilder: (context, index) {
                  //       return GestureDetector(
                  //         onTap: () {
                  //           setState(() {
                  //             _selectedSize = index;
                  //           });
                  //         },
                  //         child: AnimatedContainer(
                  //           duration: Duration(milliseconds: 500),
                  //           margin: EdgeInsets.only(right: 10),
                  //           decoration: BoxDecoration(
                  //               color: _selectedSize == index
                  //                   ? Colors.yellow[800]
                  //                   : Colors.grey.shade200,
                  //               shape: BoxShape.circle),
                  //           width: 40,
                  //           height: 40,
                  //           child: Center(
                  //             child: Text(
                  //               size[index],
                  //               style: TextStyle(
                  //                   color: _selectedSize == index
                  //                       ? Colors.white
                  //                       : Colors.black,
                  //                   fontSize: 15),
                  //             ),
                  //           ),
                  //         ),
                  //       );
                  //     },
                  //   ),
                  // ),
                  // SizedBox(
                  //   height: 20,
                  // ),
                  _isLoading
                      ? MaterialButton(
                          onPressed: () {
                            // Navigator.pop(context);
                            Navigator.push(
                                context,
                                MaterialPageRoute(
                                    builder: (context) => FormPage(
                                        labelle_Service: widget.hotel.name,
                                        nb_pax: _selectedSize1,
                                        service_id: widget.hotel.id)));
                          },
                          height: 50,
                          elevation: 0,
                          splashColor: Colors.yellow[700],
                          shape: RoundedRectangleBorder(
                              borderRadius: BorderRadius.circular(10)),
                          color: Colors.yellow[800],
                          child: Center(
                            child: Text(
                              "Réserver",
                              style:
                                  TextStyle(color: Colors.white, fontSize: 18),
                            ),
                          ),
                        )
                      : MaterialButton(
                          onPressed: () {
                            // Navigator.pop(context);
                            Navigator.push(
                                context,
                                MaterialPageRoute(
                                    builder: (context) => LoginPage()));
                          },
                          height: 50,
                          elevation: 0,
                          splashColor: Colors.yellow[700],
                          shape: RoundedRectangleBorder(
                              borderRadius: BorderRadius.circular(10)),
                          color: Colors.yellow[800],
                          child: Center(
                            child: Text(
                              "se connecter",
                              style:
                                  TextStyle(color: Colors.white, fontSize: 18),
                            ),
                          ))
                ],
              ))
        ])),
      ]),
    );
  }
}
