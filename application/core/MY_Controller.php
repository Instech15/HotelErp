<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

        protected $statusCode = 200;

        public function __construct()
        {
            parent::__construct();
        }

        /**
         * Getter for statusCode
         *
         * @return mixed
         */
        public function getStatusCode()
        {
            return $this->statusCode;
        }

        /**
         *
         * Setter for statusCode
         *
         * @param int $statusCode Value to set
         * @return self
         */
        public function setStatusCode($statusCode)
        {
            $this->statusCode = $statusCode;
            return $this;
        }

        /**
         *
         * @param array $data
         * @param array $headers
         * @return mixed
         */
        public function respond($data)
        {

            return $this->output
            ->set_content_type('application/json')
            ->set_status_header($this->getStatusCode())
            ->set_output(json_encode($data));
        }

        /**
         *
         * @param string $message
         * @return mixed
         */
        public function respondWithSuccess($message, $data = '')
        {
            
            if (!empty($data)) {
                array_walk_recursive($data, function (&$item, $key) {
                    $item = ( $item === NULL ) ? '' : $item;
                });
            }
            
            return $this->respond([

                    'status' => 'success',
                    'status_code' => 1,
                    'message' => $message,
                    'data' => $data,

            ]);
        }

        /**
         *
         * @param string $message
         * @return mixed
         */
        public function respondWithError($message, $data = '')
        {

            return $this->setStatusCode(200)->respond([

                    'status' => 'failed',
                    'status_code' => 0,
                    'message' => $message,
                    'data' => $data

            ]);
        }

        /**
         *
         * @param string $message
         * @return mixed
         */
        public function respondUserNotReg($message, $data = '')
        {

            return $this->setStatusCode(200)->respond([

                    'status' => 'no_registered',
                    'status_code' => 0,
                    'message' => $message,
                    'data' => $data

            ]);
        }

        /**
         *
         * @param string $message
         * @return mixed
         */
        public function respondWithValidationError($data = '', $message = 'Validation failed')
        {
            
            $response = [];
            if(!empty($data)) {
                $sl = 0;
                foreach ($data as $key => $value) { 
                    $response[$sl][$key] = $value;
                    $sl ++;
                }
            }

            return $this->setStatusCode(400)->respond([

                    'status' => 'failed',
                    'status_code' => 0,
                    'message' => $message,
                    'data' => $response

            ]);
        }
		public function respondWithValidationregisError($data = '', $message = 'Validation failed')
        {
            
            $response ="";
            if(!empty($data)) {
                $sl = 0;
                foreach ($data as $key => $value) { 
                    $response.= $value.",";
                    $sl ++;
                }
            }
	       $response =trim($response,',');

            return $this->setStatusCode(400)->respond([

                    'status' => 'failed',
                    'status_code' => 0,
                    'message' => $message,
                    'data' => $response

            ]);
        }

        /**
         *
         * Response 400 HTTP header
         * and a given message.
         * @return  Response
         */
        public function respondWrongArgs($message = 'Wrong Arguments')
        {
            return $this->setStatusCode(400)->respondWithError($message);
        }

        /**
         *
         * Response 401 HTTP header
         * and a given message.
         * @return  Response
         */
        public function respondUnauthorized($message = 'Unauthorized')
        {
            return $this->setStatusCode(401)->respondWithError($message);
        }

        /**
         *
         * Response 403 HTTP header
         * and a given message.
         * @return  Response
         */
        public function respondForbidden($message = 'Forbidden')
        {
            return $this->setStatusCode(403)->respondWithError($message);
        }

        /**
         *
         * Response 404 HTTP header
         * and a given message.
         * @return  Response
         */
        public function respondNotFound($message = 'Not found')
        {
            return $this->setStatusCode(404)->respondWithError($message);
        }

        /**
         *
         * Response 500 HTTP header
         * and a given message.
         * @return  Response
         */
        public function respondInternalError($message = 'Internal Error')
        {
            return $this->setStatusCode(500)->respondWithError($message);
        }

}
