import 'package:adobe_xd/adobe_xd.dart';
import 'package:day34/pages/login.dart';
import 'package:day34/pages/newuser.page.dart';
import 'package:flutter/material.dart';
import 'package:adobe_xd/pinned.dart';

import 'package:flutter_svg/flutter_svg.dart';

import 'explore.dart';

class Plandetravail1 extends StatelessWidget {
  Plandetravail1({
    Key? key,
  }) : super(key: key);
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: const Color(0xffffffff),
      body: Stack(
        children: <Widget>[
          Container(
            decoration: BoxDecoration(
              image: DecorationImage(
                image: const AssetImage('assets/images/welecom.jpg'),
                fit: BoxFit.cover,
              ),
            ),
            //margin: EdgeInsets.fromLTRB(-32.2, 0.0, -151.0, 0.0),
          ),
          Pinned.fromPins(
            Pin(size: 290.0, end: 58.8),
            Pin(size: 80.0, middle: 0.2819),
            child: const Text(
              'VOTRE PARTENAIRE\nDE BONS PLANS',
              style: TextStyle(
                fontFamily: 'Poppins-Regular',
                fontSize: 32,
                color: Color(0xffffffff),
                height: 1.1059081554412842,
              ),
              textHeightBehavior:
                  TextHeightBehavior(applyHeightToFirstAscent: false),
              textAlign: TextAlign.center,
              softWrap: false,
            ),
          ),
          /*  Align(
            alignment: Alignment(-0.002, -0.257),
            child: PageLink(
              links: [
                PageLinkInfo(
                  transition: LinkTransition.Fade,
                  ease: Curves.easeOut,
                  duration: 0.3,
                  pageBuilder: () => ExplorePage(),
                ),
              ],
              child: Container(
                width: 189.0,
                height: 42.0,
                decoration: BoxDecoration(
                  color: Color.fromARGB(157, 255, 255, 255),
                  borderRadius: BorderRadius.circular(15.76),
                ),
              ),
            ),
          ), */
          /*   const Align(
            alignment: Alignment(0.004, -0.253),
            child: SizedBox(
              width: 80.0,
              height: 40.0,
              child: Text(
                'START',
                style: TextStyle(
                  fontFamily: 'Poppins-ExtraLight',
                  fontSize: 29,
                  color: Color(0xffffffff),
                  height: 1.3381634416251347,
                ),
                textHeightBehavior:
                    TextHeightBehavior(applyHeightToFirstAscent: false),
                textAlign: TextAlign.center,
                softWrap: false,
              ),
            ),
          ), */
          Pinned.fromPins(
            Pin(size: 189.0, middle: 0.5),
            Pin(size: 41.9, end: 92.4),
            child: PageLink(
              links: [
                PageLinkInfo(
                  transition: LinkTransition.Fade,
                  ease: Curves.easeOut,
                  duration: 0.3,
                  pageBuilder: () => LoginPage(),
                ),
              ],
              child: Container(
                decoration: BoxDecoration(
                  color: const Color(0xff3e8ef2),
                  borderRadius: BorderRadius.circular(15.76),
                  boxShadow: [
                    BoxShadow(
                      color: const Color(0x33000000),
                      offset: Offset(0, 0),
                      blurRadius: 3,
                    ),
                  ],
                ),
              ),
            ),
          ),
          Pinned.fromPins(
            Pin(size: 189.0, middle: 0.5),
            Pin(size: 41.9, end: 43.4),
            child: PageLink(
              links: [
                PageLinkInfo(
                  transition: LinkTransition.Fade,
                  ease: Curves.easeOut,
                  duration: 0.3,
                  pageBuilder: () => NewUser(),
                ),
              ],
              child: Container(
                decoration: BoxDecoration(
                  color: const Color(0xf5ffffff),
                  borderRadius: BorderRadius.circular(15.76),
                  boxShadow: [
                    BoxShadow(
                      color: const Color(0x31000000),
                      offset: Offset(0, 0),
                      blurRadius: 3,
                    ),
                  ],
                ),
              ),
            ),
          ),
          Pinned.fromPins(
            Pin(size: 50.0, middle: 0.5003),
            Pin(size: 27.0, end: 99.4),
            child: Text(
              'Login',
              style: TextStyle(
                fontFamily: 'Poppins-Light',
                fontSize: 19,
                color: const Color(0xffffffff),
                height: 2.04245998984889,
              ),
              textHeightBehavior:
                  TextHeightBehavior(applyHeightToFirstAscent: false),
              textAlign: TextAlign.center,
              softWrap: false,
            ),
          ),
          Pinned.fromPins(
            Pin(size: 66.0, middle: 0.5099),
            Pin(size: 27.0, end: 52.4),
            child: Text(
              'Regiter',
              style: TextStyle(
                fontFamily: 'Poppins-Light',
                fontSize: 19,
                color: const Color(0xff3e8ef2),
                height: 2.04245998984889,
              ),
              textHeightBehavior:
                  TextHeightBehavior(applyHeightToFirstAscent: false),
              textAlign: TextAlign.center,
              softWrap: false,
            ),
          ),
          Pinned.fromPins(
            Pin(size: 704.0, end: -610.2),
            Pin(size: 476.0, end: -424.7),
            child: Stack(
              children: <Widget>[
                Container(
                  decoration: BoxDecoration(
                    image: DecorationImage(
                      image: const AssetImage(''),
                      fit: BoxFit.fill,
                      colorFilter: new ColorFilter.mode(
                          Colors.black.withOpacity(0.2), BlendMode.dstIn),
                    ),
                  ),
                ),
                Pinned.fromPins(
                  Pin(size: 413.0, middle: 0.4918),
                  Pin(size: 370.0, end: 9.0),
                  child: Stack(
                    children: <Widget>[
                      Stack(
                        children: <Widget>[
                          Stack(
                            children: <Widget>[
                              Container(
                                decoration: BoxDecoration(
                                  image: DecorationImage(
                                    image: const AssetImage(''),
                                    fit: BoxFit.fill,
                                  ),
                                ),
                                //margin: EdgeInsets.fromLTRB(
                                //   -134.0, -87.9, -139.0, 0.0),
                              ),
                              SizedBox.expand(
                                  child: SvgPicture.string(
                                _svg_vrvk,
                                allowDrawingOutsideViewBox: true,
                                fit: BoxFit.fill,
                              )),
                            ],
                          ),
                        ],
                      ),
                    ],
                  ),
                ),
              ],
            ),
          ),
          Pinned.fromPins(
            Pin(size: 173.0, middle: 0.5213),
            Pin(size: 173.0, start: 66.1),
            child: Container(
              decoration: BoxDecoration(
                image: DecorationImage(
                  image: const AssetImage(''),
                  fit: BoxFit.fill,
                ),
              ),
            ),
          ),
        ],
      ),
    );
  }
}

const String _svg_vrvk =
    '<svg viewBox="779.1 0.9 413.0 370.0" ><path  d="M 779.1019897460938 0.9449999928474426 L 1192.10205078125 0.9449999928474426 L 1192.10205078125 345.9450073242188 C 1192.10205078125 359.7520141601562 1180.909057617188 370.9450073242188 1167.10205078125 370.9450073242188 L 804.1019897460938 370.9450073242188 C 790.2949829101562 370.9450073242188 779.1019897460938 359.7520141601562 779.1019897460938 345.9450073242188 L 779.1019897460938 0.9449999928474426 Z" fill="none" stroke="none" stroke-width="1" stroke-miterlimit="10" stroke-linecap="butt" /></svg>';
