import 'package:day34/models/circuit.dart';
import 'package:day34/models/product.dart';
import 'package:day34/models/voyage.dart';
import 'package:day34/pages/form.dart';
import 'package:day34/pages/login.dart';
import 'package:flutter/material.dart';
import 'package:shared_preferences/shared_preferences.dart';

import '../models/event.dart';

class CircuitViewPage extends StatefulWidget {
  final Circuit circuit;
  const CircuitViewPage({Key? key, required this.circuit}) : super(key: key);

  @override
  _CircuitViewPageState createState() => _CircuitViewPageState();
}

class _CircuitViewPageState extends State<CircuitViewPage> {
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
  late bool _isLoading = false;

  _ConnectedUser() async {
    SharedPreferences connecter = await SharedPreferences.getInstance();
    setState(() {
      _isLoading = connecter.getBool("token")!;
    });
  }

  @override
  void initState() {
    _ConnectedUser();
    super.initState();
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
                "http://127.0.0.1:8000/storage/circuits/" +
                    widget.circuit.image,
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
                            widget.circuit.name,
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
                            widget.circuit.nbjours,
                            style: TextStyle(
                              color: Colors.orange.shade400,
                              fontSize: 14,
                            ),
                          ),
                        ],
                      ),
                      Text(
                        widget.circuit.prix.toString() + "\Dt ",
                        style: TextStyle(color: Colors.black, fontSize: 16),
                      ),
                    ],
                  ),
                  SizedBox(
                    height: 20,
                  ),
                  Text(
                    widget.circuit.description,
                    style: TextStyle(
                      height: 1.5,
                      color: Colors.grey.shade800,
                      fontSize: 15,
                    ),
                  ),
                  SizedBox(
                    height: 30,
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
                                        labelle_Service: widget.circuit.name,
                                        nb_pax: _selectedSize1,
                                        service_id: widget.circuit.id)));
                          },
                          height: 50,
                          elevation: 0,
                          splashColor: Colors.yellow[700],
                          shape: RoundedRectangleBorder(
                              borderRadius: BorderRadius.circular(10)),
                          color: Colors.yellow[800],
                          child: Center(
                            child: Text(
                              "R??server",
                              style:
                                  TextStyle(color: Colors.white, fontSize: 18),
                            ),
                          ))
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
