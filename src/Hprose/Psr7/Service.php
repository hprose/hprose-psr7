<?php
/**********************************************************\
|                                                          |
|                          hprose                          |
|                                                          |
| Official WebSite: http://www.hprose.com/                 |
|                   http://www.hprose.org/                 |
|                                                          |
\**********************************************************/

/**********************************************************\
 *                                                        *
 * Hprose/Psr7/Service.php                                *
 *                                                        *
 * hprose psr7 http service class for php 5.3+            *
 *                                                        *
 * LastModified: Jul 22, 2016                             *
 * Author: Ma Bingyao <andot@hprose.com>                  *
 *                                                        *
\**********************************************************/

namespace Hprose\Psr7;

class Service extends \Hprose\Http\Service {
    const ORIGIN = 'Origin';
    public function header($name, $value, $context) {
        $context->response = $context->response->withAddedHeader($name, $value);
    }
    public function getAttribute($name, $context) {
        return $context->request->getHeaderLine($name);
    }
    public function hasAttribute($name, $context) {
        return $context->request->hasHeader($name);
    }
    protected function readRequest($context) {
        return $context->request->getBody()->getContents();
    }
    public function writeResponse($data, $context) {
        $context->response->getBody()->write($data);
    }
    public function isGet($context) {
        return ($context->request->getMethod() === 'GET');
    }
    public function isPost($context) {
        return ($context->request->getMethod() === 'POST');
    }
}
