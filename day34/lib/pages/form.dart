import 'dart:convert';

import 'package:day34/animation/FadeAnimation.dart';
import 'package:day34/main.dart';
import 'package:day34/models/product.dart';
import 'package:day34/pages/payment.dart';
import 'package:day34/pages/agence.dart';
import 'package:day34/pages/payment_success.dart';
import 'package:day34/pages/product_view.dart';
import 'package:dotted_border/dotted_border.dart';
import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'package:flutter_slidable/flutter_slidable.dart';
import 'package:http/http.dart' as http;
import 'package:shared_preferences/shared_preferences.dart';

class FormPage extends StatefulWidget {
  String labelle_Service;
  int service_id;
  int nb_pax;
  FormPage(
      {Key? key,
      required this.labelle_Service,
      required this.nb_pax,
      required this.service_id})
      : super(key: key);

  @override
  _FormPageState createState() => _FormPageState();
}

enum SingingCharacter { espace, visa, bank }

class _FormPageState extends State<FormPage> with TickerProviderStateMixin {
  final TextEditingController nomController = new TextEditingController();
  final TextEditingController prenomController = new TextEditingController();
  final TextEditingController portableController = new TextEditingController();
  final TextEditingController adresseController = new TextEditingController();
  SingingCharacter? _character = SingingCharacter.espace;
  int activeCard = 0;

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        elevation: 0,
        backgroundColor: Colors.yellow[800],
        title: Text('Réservation', style: TextStyle(color: Colors.black)),
      ),
      body: SingleChildScrollView(
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.center,
          children: <Widget>[
            FadeAnimation(
                1,
                Image.network(
                  'https://ouch-cdn2.icons8.com/7fkWk5J2YcodnqGn62xOYYfkl6qhmsCfT2033W-FjaA/rs:fit:784:784/czM6Ly9pY29uczgu/b3VjaC1wcm9kLmFz/c2V0cy9zdmcvMjU5/LzRkM2MyNzJlLWFh/MmQtNDA3Ni04YzU0/LTY0YjNiMzQ4NzQw/OS5zdmc.png',
                  width: 250,
                )),
            Padding(
              padding: const EdgeInsets.symmetric(horizontal: 8, vertical: 8),
              child: TextField(
                controller: prenomController,
                decoration: InputDecoration(
                  enabledBorder: OutlineInputBorder(
                    borderSide: BorderSide(color: Colors.yellow.shade400),
                  ),
                  hintText: 'Prénom',
                ),
              ),
            ),
            Padding(
              padding: const EdgeInsets.symmetric(horizontal: 8, vertical: 8),
              child: TextField(
                controller: nomController,
                decoration: InputDecoration(
                  enabledBorder: OutlineInputBorder(
                    borderSide: BorderSide(color: Colors.yellow.shade400),
                  ),
                  hintText: 'Nom',
                ),
              ),
            ),
            Padding(
              padding: const EdgeInsets.symmetric(horizontal: 8, vertical: 8),
              child: TextField(
                controller: portableController,
                decoration: InputDecoration(
                  enabledBorder: OutlineInputBorder(
                    borderSide: BorderSide(color: Colors.yellow.shade400),
                  ),
                  hintText: 'Portable',
                ),
              ),
            ),
            Padding(
              padding: const EdgeInsets.symmetric(horizontal: 8, vertical: 8),
              child: TextField(
                controller: adresseController,
                decoration: InputDecoration(
                  enabledBorder: OutlineInputBorder(
                    borderSide: BorderSide(color: Colors.yellow.shade400),
                  ),
                  hintText: 'Adresse',
                ),
              ),
            ),
            // FadeAnimation(
            //     1.2,
            //     Text(
            //       "Choisissez le moyen de paiement:",
            //       style: TextStyle(fontSize: 18, fontWeight: FontWeight.bold),
            //     )),
            // SizedBox(
            //   height: 20,
            // ),
            // FadeAnimation(
            //     1.3,
            //     Row(children: [
            //       GestureDetector(
            //         onTap: () {
            //           setState(() {
            //             activeCard = 0;
            //           });
            //         },
            //         child: AnimatedContainer(
            //           duration: Duration(milliseconds: 300),
            //           margin: EdgeInsets.only(right: 10),
            //           padding: EdgeInsets.symmetric(horizontal: 20),
            //           decoration: BoxDecoration(
            //             borderRadius: BorderRadius.circular(18),
            //             border: activeCard == 0
            //                 ? Border.all(color: Colors.grey.shade300, width: 1)
            //                 : Border.all(
            //                     color: Colors.grey.shade300.withOpacity(0),
            //                     width: 1),
            //           ),
            //           child: Image.network(
            //             'https://img.icons8.com/color/48/000000/travel-agency.png',
            //             height: 50,
            //           ),
            //         ),
            //       ),
            //       GestureDetector(
            //         onTap: () {
            //           setState(() {
            //             activeCard = 0;
            //           });
            //         },
            //         child: AnimatedContainer(
            //           duration: Duration(milliseconds: 300),
            //           margin: EdgeInsets.only(right: 10),
            //           padding: EdgeInsets.symmetric(horizontal: 20),
            //           decoration: BoxDecoration(
            //             borderRadius: BorderRadius.circular(18),
            //             border: activeCard == 0
            //                 ? Border.all(color: Colors.grey.shade300, width: 1)
            //                 : Border.all(
            //                     color: Colors.grey.shade300.withOpacity(0),
            //                     width: 1),
            //           ),
            //           child: Image.network(
            //             'https://img.icons8.com/color/48/000000/mastercard-logo.png',
            //             height: 50,
            //           ),
            //         ),
            //       ),
            //       GestureDetector(
            //         onTap: () {
            //           setState(() {
            //             activeCard = 1;
            //           });
            //         },
            //         child: AnimatedContainer(
            //           duration: Duration(milliseconds: 300),
            //           margin: EdgeInsets.only(right: 10),
            //           padding: EdgeInsets.symmetric(horizontal: 20),
            //           decoration: BoxDecoration(
            //             borderRadius: BorderRadius.circular(18),
            //             border: activeCard == 1
            //                 ? Border.all(color: Colors.grey.shade300, width: 1)
            //                 : Border.all(
            //                     color: Colors.grey.shade300.withOpacity(0),
            //                     width: 1),
            //           ),
            //           child: Image.network(
            //             'https://img.icons8.com/external-sbts2018-outline-color-sbts2018/58/000000/external-bank-transfer-payment-1-sbts2018-outline-color-sbts2018.png',
            //             height: 50,
            //           ),
            //         ),
            //       ),
            //     ])),
            Padding(
              padding: const EdgeInsets.only(top: 50),
              child: MaterialButton(
                onPressed: () {
                  // Navigator.pop(context);
                  // Navigator.push(context,
                  //     MaterialPageRoute(builder: (context) => FormPage()));
                  _seReserver(
                      prenomController.text,
                      nomController.text,
                      portableController.text,
                      adresseController.text,
                      widget.labelle_Service,
                      widget.service_id,
                      widget.nb_pax);
                },
                height: 50,
                elevation: 0,
                splashColor: Colors.yellow[700],
                shape: RoundedRectangleBorder(
                    borderRadius: BorderRadius.circular(10)),
                color: Colors.yellow[800],
                child: Center(
                  child: Text(
                    "Payment en ligne",
                    style: TextStyle(color: Colors.white, fontSize: 18),
                  ),
                ),
              ),
            ),
            Padding(
              padding: const EdgeInsets.only(top: 20),
              child: MaterialButton(
                onPressed: () {
                  // Navigator.pop(context);
                  // Navigator.push(context,
                  //     MaterialPageRoute(builder: (context) => FormPage()));
                  _seReserveragence(
                      prenomController.text,
                      nomController.text,
                      portableController.text,
                      adresseController.text,
                      widget.labelle_Service,
                      widget.service_id,
                      widget.nb_pax);
                },
                height: 50,
                elevation: 0,
                splashColor: Colors.blue[700],
                shape: RoundedRectangleBorder(
                    borderRadius: BorderRadius.circular(10)),
                color: Colors.blue[800],
                child: Center(
                  child: Text(
                    "Payée a l'agence",
                    style: TextStyle(color: Colors.white, fontSize: 18),
                  ),
                ),
              ),
            )
          ],
        ),
      ),
    );
  }

  Future<void> _seReserver(
      String prenom,
      String nom,
      String portable,
      String adresse,
      String labelle_service,
      int service_id,
      int nb_pax) async {
    SharedPreferences sh = await SharedPreferences.getInstance();
    final response = await http.post(
      Uri.parse('http://127.0.0.1:8000/api/reservations'),
      headers: <String, String>{
        'Content-Type': 'application/json; charset=UTF-8',
      },
      body: jsonEncode(<String, dynamic>{
        'prenom': prenom,
        'nom': nom,
        'portable': portable,
        'adresse': adresse,
        'labelle_service': labelle_service,
        'service_id': service_id,
        'nb_pax': nb_pax,
        'user_id': (sh.getInt("idUser")!),
      }),
    );
    var datauser = json.decode(response.body);
    if (datauser["success"]) {
      print('ok');
      Navigator.pushReplacement(
          context, MaterialPageRoute(builder: (context) => PaymentPage()));
    } else {
      print('no');
      // Future.delayed(Duration.zero, () => showAlert(context));
      Navigator.pushReplacement(
          context, MaterialPageRoute(builder: (context) => HomePage()));
    }
  }

  Future<void> _seReserveragence(
      String prenom,
      String nom,
      String portable,
      String adresse,
      String labelle_service,
      int service_id,
      int nb_pax) async {
    SharedPreferences sh = await SharedPreferences.getInstance();
    final response = await http.post(
      Uri.parse('http://127.0.0.1:8000/api/reservations'),
      headers: <String, String>{
        'Content-Type': 'application/json; charset=UTF-8',
      },
      body: jsonEncode(<String, dynamic>{
        'prenom': prenom,
        'nom': nom,
        'portable': portable,
        'adresse': adresse,
        'labelle_service': labelle_service,
        'service_id': service_id,
        'nb_pax': nb_pax,
        'user_id': (sh.getInt("idUser")!),
      }),
    );
    var datauser = json.decode(response.body);
    if (datauser["success"]) {
      print('ok');
      Navigator.pushReplacement(
          context, MaterialPageRoute(builder: (context) => Agence()));
    } else {
      print('no');
      // Future.delayed(Duration.zero, () => showAlert(context));
      Navigator.pushReplacement(
          context, MaterialPageRoute(builder: (context) => HomePage()));
    }
  }
}

@override
Widget build(BuildContext context) {
  // TODO: implement build
  throw UnimplementedError();
}
