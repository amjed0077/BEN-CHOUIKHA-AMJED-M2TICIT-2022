import 'package:day34/animation/FadeAnimation.dart';
import 'package:day34/main.dart';
import 'package:flutter/material.dart';
import 'package:flutter_map/flutter_map.dart';

class Agence extends StatefulWidget {
  const Agence({Key? key}) : super(key: key);

  @override
  _AgenceState createState() => _AgenceState();
}

class _AgenceState extends State<Agence> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
        backgroundColor: Colors.white,
        body: Container(
          padding: EdgeInsets.all(40.0),
          width: double.infinity,
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.center,
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              FadeAnimation(
                  1,
                  Image.network(
                    'https://ouch-cdn2.icons8.com/7fkWk5J2YcodnqGn62xOYYfkl6qhmsCfT2033W-FjaA/rs:fit:784:784/czM6Ly9pY29uczgu/b3VjaC1wcm9kLmFz/c2V0cy9zdmcvMjU5/LzRkM2MyNzJlLWFh/MmQtNDA3Ni04YzU0/LTY0YjNiMzQ4NzQw/OS5zdmc.png',
                    width: 250,
                  )),
              SizedBox(
                height: 50.0,
              ),
              FadeAnimation(
                  1.2,
                  Text(
                    'Tunis Avenue La liberté ',
                    style:
                        TextStyle(fontSize: 25.0, fontWeight: FontWeight.w300),
                  )),
              SizedBox(
                height: 20.0,
              ),
              FadeAnimation(
                  1.2,
                  Text(
                    'Djerba Av Farhat hachad midoun ',
                    style:
                        TextStyle(fontSize: 25.0, fontWeight: FontWeight.w300),
                  )),
              SizedBox(
                height: 20.0,
              ),
              FadeAnimation(
                  1.2,
                  Text(
                    'Douz Av Taieb Mhiri ',
                    style:
                        TextStyle(fontSize: 25.0, fontWeight: FontWeight.w300),
                  )),
              SizedBox(
                height: 20.0,
              ),
              FadeAnimation(
                  1.3,
                  Text(
                    'Si votre réservation ne sera pas payée pendant 3 jours ca poura etre annulée !!!! ',
                    textAlign: TextAlign.center,
                    style: TextStyle(
                        fontSize: 16.0,
                        color: Color.fromARGB(255, 255, 14, 14)),
                  )),
              SizedBox(
                height: 140.0,
              ),
              FadeAnimation(
                1.4,
                MaterialButton(
                  onPressed: () {
                    Navigator.push(context,
                        MaterialPageRoute(builder: (context) => HomePage()));
                  },
                  height: 50,
                  elevation: 0,
                  splashColor: Colors.yellow[700],
                  shape: RoundedRectangleBorder(
                      borderRadius: BorderRadius.circular(10)),
                  color: Colors.yellow[800],
                  child: Center(
                    child: Text(
                      "Page d'accueil",
                      style: TextStyle(color: Colors.white, fontSize: 16),
                    ),
                  ),
                ),
              ),
              SizedBox(
                height: 20.0,
              ),
              FadeAnimation(
                  1.4,
                  Text(
                    'Contactez-nous 71 782 020.',
                    style: TextStyle(fontSize: 14.0, color: Colors.grey),
                  )),
            ],
          ),
        ));
  }
}
