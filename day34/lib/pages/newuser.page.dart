import 'dart:convert';

import 'package:day34/main.dart';
import 'package:day34/pages/login.dart';
import 'package:flutter/material.dart';
// import 'package:day34/widget/buttonNewUser.dart';
// import 'package:day34/widget/newEmail.dart';
// import 'package:day34/widget/newName.dart';
// import 'package:day34/widget/password.dart';
import 'package:day34/widget/singup.dart';
import 'package:day34/widget/textNew.dart';
// import 'package:day34/widget/userOld.dart';
import 'package:http/http.dart' as http;

class NewUser extends StatefulWidget {
  @override
  _NewUserState createState() => _NewUserState();
}

class _NewUserState extends State<NewUser> {
  final TextEditingController nomController = new TextEditingController();
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
                Color.fromARGB(0, 40, 169, 255),
                Color.fromARGB(255, 40, 169, 255)
              ]),
        ),
        child: ListView(
          children: <Widget>[
            Column(
              children: <Widget>[
                Row(
                  children: <Widget>[
                    SingUp(),
                    TextNew(),
                  ],
                ),
                NewNome(),
                NewEmail(),
                PasswordInput(),
                ButtonNewUser(),
                UserOld(),
              ],
            ),
          ],
        ),
      ),
    );
  }

  NewNome() {
    return Padding(
      padding: const EdgeInsets.only(top: 50, left: 50, right: 50),
      child: Container(
        height: 60,
        width: MediaQuery.of(context).size.width,
        child: TextField(
          controller: nomController,
          style: TextStyle(
            color: Colors.white,
          ),
          decoration: InputDecoration(
            border: InputBorder.none,
            fillColor: Colors.lightBlueAccent,
            labelText: 'Nom',
            labelStyle: TextStyle(
              color: Colors.white70,
            ),
          ),
        ),
      ),
    );
  }

  NewEmail() {
    return Padding(
      padding: const EdgeInsets.only(top: 20, left: 50, right: 50),
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
            labelText: 'E-mail',
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
            color: Color.fromARGB(255, 255, 255, 255),
          ),
          obscureText: true,
          decoration: InputDecoration(
            border: InputBorder.none,
            labelText: 'Mot de passe',
            labelStyle: TextStyle(
              color: Color.fromARGB(255, 255, 255, 255),
            ),
          ),
        ),
      ),
    );
  }

  ButtonNewUser() {
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
            //Navigator.pop(context);
            _seEnregistre(nomController.text, emailController.text,
                passwordController.text);
          },
          child: Row(
            mainAxisAlignment: MainAxisAlignment.center,
            children: <Widget>[
              Text(
                'OK',
                style: TextStyle(
                  color: Color.fromARGB(255, 137, 218, 255),
                  fontSize: 14,
                  fontWeight: FontWeight.w700,
                ),
              ),
              Icon(
                Icons.arrow_forward,
                color: Colors.lightBlueAccent,
              ),
            ],
          ),
        ),
      ),
    );
  }

  UserOld() {
    return Padding(
      padding: const EdgeInsets.only(top: 30, left: 30),
      child: Container(
        alignment: Alignment.topRight,
        //color: Colors.red,
        height: 20,
        child: Row(
          children: <Widget>[
            Text(
              'Have we met before?',
              style: TextStyle(
                fontSize: 12,
                color: Color.fromARGB(255, 253, 76, 22),
              ),
            ),
            FlatButton(
              padding: EdgeInsets.all(0),
              onPressed: () {
                Navigator.push(context,
                    MaterialPageRoute(builder: (context) => LoginPage()));
              },
              child: Text(
                'Sing in',
                style: TextStyle(
                  fontSize: 12,
                  color: Color.fromARGB(255, 253, 76, 22),
                ),
                textAlign: TextAlign.right,
              ),
            ),
          ],
        ),
      ),
    );
  }

  Future<void> _seEnregistre(String name, String mail, String password) async {
    final response = await http.post(
      Uri.parse('http://127.0.0.1:8000/api/mobile/register'),
      headers: <String, String>{
        'Content-Type': 'application/json; charset=UTF-8',
      },
      body: jsonEncode(<String, String>{
        'name': name,
        'email': mail,
        'password': password,
      }),
    );
    var datauser = json.decode(response.body);
    if (datauser["success"]) {
      print('ok');
      Navigator.pushReplacement(
          context, MaterialPageRoute(builder: (context) => HomePage()));
    } else {
      print('no');
      // Future.delayed(Duration.zero, () => showAlert(context));
      Navigator.pushReplacement(
          context, MaterialPageRoute(builder: (context) => NewUser()));
    }
  }
}
