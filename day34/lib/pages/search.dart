// import 'package:day34/widget/first.dart';
import 'package:day34/animation/FadeAnimation.dart';
import 'package:day34/pages/resultat.dart';
import 'package:day34/pages/payment.dart';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import '../widget/calendar_popup_view.dart';
import 'dart:convert';

// import 'package:day34/widget/first.dart';

class SearchPage extends StatefulWidget {
  @override
  _SearchPageState createState() => _SearchPageState();
}

class _SearchPageState extends State<SearchPage> {
  String dropdownValue = 'Hotel';
  String dropdownValue2 = 'Tunis';
  DateTime startDate = DateTime.now();
  DateTime endDate = DateTime.now().add(const Duration(days: 5));
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        elevation: 0,
        backgroundColor: Colors.transparent,
        leading: IconButton(
          icon: Icon(Icons.arrow_back, color: Colors.black),
          onPressed: () => Navigator.of(context).pop(),
        ),
      ),
      body: Container(
        decoration: BoxDecoration(
          gradient: LinearGradient(
              begin: Alignment.topRight,
              end: Alignment.bottomLeft,
              colors: [
                Color.fromARGB(255, 255, 255, 255),
                Color.fromARGB(255, 0, 179, 250)
              ]),
        ),
        child: ListView(
          children: <Widget>[
            Column(
              children: <Widget>[
                Row(children: <Widget>[
                  VerticalText(),
                  TextLogin(),
                ]),
                InputService(),
                LieuInput(),
                ButtonLogin(),
                FirstTime(),
              ],
            ),
          ],
        ),
      ),
    );
  }

  InputService() {
    return DropdownButton<String>(
      value: dropdownValue,
      icon: const Icon(Icons.arrow_downward),
      elevation: 16,
      style: const TextStyle(color: Color.fromARGB(255, 238, 96, 13)),
      underline: Container(
        height: 2,
        color: Color.fromARGB(255, 238, 96, 13),
      ),
      onChanged: (String? newValue) {
        setState(() {
          dropdownValue = newValue!;
        });
      },
      items: <String>['Hotel', 'Circuit', 'Evenement', 'Voyage']
          .map<DropdownMenuItem<String>>((String value) {
        return DropdownMenuItem<String>(
          value: value,
          child: Text(value),
        );
      }).toList(),
    );
  }

  LieuInput() {
    return DropdownButton<String>(
      value: dropdownValue2,
      icon: const Icon(Icons.arrow_downward),
      elevation: 2,
      style: const TextStyle(color: Color.fromARGB(255, 245, 90, 13)),
      underline: Container(
        height: 5,
        color: Color.fromARGB(255, 245, 90, 13),
      ),
      onChanged: (String? newValue) {
        setState(() {
          dropdownValue2 = newValue!;
        });
      },
      items: <String>['Tunis', 'Djerba', 'Hammamet', 'Istanbul']
          .map<DropdownMenuItem<String>>((String value) {
        return DropdownMenuItem<String>(
          value: value,
          child: Text(value),
        );
      }).toList(),
    );
  }

  TextLogin() {
    return Padding(
      padding: const EdgeInsets.only(top: 30.0, left: 10.0),
      child: Container(
        //color: Colors.green,
        height: 200,
        width: 200,
        child: Column(
          children: <Widget>[
            Container(
              height: 60,
            ),
            Center(
              child: Text(
                'Votre Voyage Idéal Au Meilleur Prix !',
                style: TextStyle(
                  fontSize: 30,
                  color: Color.fromARGB(255, 238, 96, 13),
                ),
              ),
            ),
          ],
        ),
      ),
    );
  }

  VerticalText() {
    return Padding(
      padding: const EdgeInsets.only(top: 60, left: 10),
      child: RotatedBox(
          quarterTurns: -1,
          child: Text(
            'Trouvez',
            style: TextStyle(
              color: Color.fromARGB(255, 238, 96, 13),
              fontSize: 35,
              fontWeight: FontWeight.w900,
            ),
          )),
    );
  }

  ButtonLogin() {
    return Padding(
      padding: const EdgeInsets.only(top: 40, right: 50, left: 50),
      child: Container(
        alignment: Alignment.center,
        height: 50,
        width: MediaQuery.of(context).size.width,
        decoration: BoxDecoration(
          // boxShadow: [
          //   BoxShadow(
          //     color: Colors.blue[300],
          //     blurRadius: 10.0, // has the effect of softening the shadow
          //     spreadRadius: 1.0, // has the effect of extending the shadow
          //     offset: Offset(
          //       5.0, // horizontal, move right 10
          //       5.0, // vertical, move down 10
          //     ),
          //   ),
          // ],
          color: Colors.white,
          borderRadius: BorderRadius.circular(30),
        ),
        child: FlatButton(
          onPressed: () {
            FocusScope.of(context).requestFocus(FocusNode());

            showDemoDialog(context: context);
          },
          child: Row(
            mainAxisAlignment: MainAxisAlignment.center,
            children: <Widget>[
              Text(
                'Quand partir ?',
                style: TextStyle(
                  color: Color.fromARGB(255, 255, 118, 64),
                  fontSize: 14,
                  fontWeight: FontWeight.w700,
                ),
              ),
              Icon(
                Icons.calendar_month_rounded,
                color: Color.fromARGB(255, 255, 118, 64),
              ),
            ],
          ),
        ),
      ),
    );
  }

  void showDemoDialog({BuildContext? context}) {
    showDialog<dynamic>(
      context: context!,
      builder: (BuildContext context) => CalendarPopupView(
        barrierDismissible: true,
        minimumDate: DateTime.now(),
        initialEndDate: endDate,
        initialStartDate: startDate,
        onApplyClick: (DateTime startData, DateTime endData) {
          setState(() {
            startDate = startData;
            endDate = endData;
          });
        },
      ),
    );
  }

  FirstTime() {
    return FadeAnimation(
        1.4,
        Padding(
          padding: EdgeInsets.all(20.0),
          child: MaterialButton(
            onPressed: () {
              /* Navigator.push(context,
                  MaterialPageRoute(builder: (context) => ResultatPage()));*/
              direct();
            },
            height: 50,
            elevation: 0,
            splashColor: Colors.yellow[700],
            shape:
                RoundedRectangleBorder(borderRadius: BorderRadius.circular(10)),
            color: Colors.yellow[800],
            child: Center(
              child: Text(
                "Cherchez",
                style: TextStyle(color: Colors.white, fontSize: 18),
              ),
            ),
          ),
        ));
  }

  Future<void> direct() async {
    // print(startDate.toString().substring(0, 10));
    var response = await http.get(
      Uri.parse('http://127.0.0.1:8000/api/mobile/filtre/' +
          dropdownValue +
          '/' +
          startDate.toString().substring(0, 10)),
      headers: <String, String>{
        'Content-Type': 'application/json; charset=UTF-8',
        'Access-Control-Allow-Origin': '*',
      },
    );

    var data = await json.decode(response.body) as List;
    Navigator.push(
        context,
        MaterialPageRoute(
            builder: (context) =>
                ResultatPage(data: data, type: dropdownValue)));
    // print(data);
  }
}
