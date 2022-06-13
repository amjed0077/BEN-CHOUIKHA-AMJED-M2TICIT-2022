import 'dart:convert';

import 'package:day34/main.dart';
import 'package:day34/models/user.dart';
import 'package:day34/pages/explore.dart';
import 'package:day34/widget/first.dart';
import 'package:flutter/material.dart';
// import 'package:day34/widget/button.dart';
// import 'package:day34/widget/first.dart';
import 'package:day34/widget/forgot.dart';
// import 'package:day34/widget/inputEmail.dart';
// import 'package:day34/widget/password.dart';
import 'package:day34/widget/textLogin.dart';
import 'package:day34/widget/verticalText.dart';
import 'package:http/http.dart' as http;
import 'package:shared_preferences/shared_preferences.dart';

class LoginPage extends StatefulWidget {
  @override
  _LoginPageState createState() => _LoginPageState();
}

class _LoginPageState extends State<LoginPage> {
  final TextEditingController emailController = new TextEditingController();
  final TextEditingController passwordController = new TextEditingController();
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
                Color.fromARGB(255, 252, 123, 11)
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
                InputEmail(),
                PasswordInput(),
                ButtonLogin(),
                FirstTime(),
              ],
            ),
          ],
        ),
      ),
    );
  }

  InputEmail() {
    return Padding(
      padding: const EdgeInsets.only(top: 50, left: 50, right: 50),
      child: Container(
        height: 60,
        width: MediaQuery.of(context).size.width,
        child: TextField(
          controller: emailController,
          style: TextStyle(
            color: Colors.white,
          ),
          decoration: InputDecoration(
            border: InputBorder.none,
            fillColor: Colors.lightBlueAccent,
            labelText: 'Adresse E-mail',
            labelStyle: TextStyle(
              color: Colors.white70,
            ),
          ),
        ),
      ),
    );
  }

  PasswordInput() {
    return Padding(
      padding: const EdgeInsets.only(top: 20, left: 50, right: 50),
      child: Container(
        height: 60,
        width: MediaQuery.of(context).size.width,
        child: TextField(
          controller: passwordController,
          style: TextStyle(
            color: Colors.white,
          ),
          obscureText: true,
          decoration: InputDecoration(
            border: InputBorder.none,
            labelText: 'Mot de passe',
            labelStyle: TextStyle(
              color: Colors.white70,
            ),
          ),
        ),
      ),
    );
  }

  ButtonLogin() {
    return Padding(
      padding: const EdgeInsets.only(top: 40, right: 50, left: 200),
      child: Container(
        alignment: Alignment.bottomRight,
        height: 50,
        width: MediaQuery.of(context).size.width,
        decoration: BoxDecoration(boxShadow: [
          // BoxShadow(
          //   color: Color.fromARGB(255, 153, 209, 255),
          //   blurRadius: 10.0, // has the effect of softening the shadow
          //   spreadRadius: 1.0, // has the effect of extending the shadow
          //   offset: Offset(
          //     5.0, // horizontal, move right 10
          //     5.0, // vertical, move down 10
          //   ),
          // ),
        ], color: Colors.white, borderRadius: BorderRadius.circular(30)),
        child: FlatButton(
          onPressed: () {
            // Navigator.pop(context);
            _seConnecter(emailController.text, passwordController.text);
          },
          child: Row(
            mainAxisAlignment: MainAxisAlignment.center,
            children: <Widget>[
              Text(
                'OK',
                style: TextStyle(
                  color: Color.fromARGB(255, 252, 123, 11),
                  fontSize: 14,
                  fontWeight: FontWeight.w700,
                ),
              ),
              Icon(
                Icons.arrow_forward,
                color: Color.fromARGB(255, 252, 123, 11),
              ),
            ],
          ),
        ),
      ),
    );
  }

  Future<void> _seConnecter(String mail, String password) async {
    SharedPreferences connecter = await SharedPreferences.getInstance();
    final response = await http.post(
      Uri.parse('http://127.0.0.1:8000/api/mobile/login'),
      headers: <String, String>{
        'Content-Type': 'application/json; charset=UTF-8',
      },
      body: jsonEncode(<String, String>{
        'email': mail,
        'password': password,
      }),
    );
    var datauser = json.decode(response.body);
    if (datauser["success"]) {
      User userdata = User.fromJson(datauser["user"][0]);

      print('ok');
      connecter.setBool("token", true);
      // connecter.setString("token", 'True');
      connecter.setInt("idUser", userdata.id);

      Navigator.pushReplacement(
          context, MaterialPageRoute(builder: (context) => HomePage()));
    } else {
      print('no');
      // Future.delayed(Duration.zero, () => showAlert(context));
      Navigator.pushReplacement(
          context, MaterialPageRoute(builder: (context) => LoginPage()));
    }
  }
}
