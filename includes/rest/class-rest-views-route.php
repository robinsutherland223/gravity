<?php
/**
 * The Views route
 *
 * @package   GravityView
 * @license   GPL2+
 * @author    Josh Pollock <josh@joshpress.net>
 * @link      http://gravityview.co
 * @copyright Copyright 2015, Katz Web Services, Inc.
 *
 * @since 1.14.4
 */
class GravityView_REST_Views_Route extends GravityView_REST_Route {

	/**
	 * Route Name
	 *
	 * @since 1.14.4
	 *
	 * @access protected
	 * @string
	 */
	protected $route_name = 'views';

	/**
	 * Sub type, forms {$namespace}/route_name/{id}/sub_type type endpoints
	 *
	 * @since 1.14.4
	 * @access protected
	 * @var string
	 */
	protected $sub_type = 'entries';


	/**
	 * Get a collection of views
	 *
	 * Callback for GET /v1/views/
	 *
	 * @param WP_REST_Request $request Full data about the request.
	 * @return WP_Error|WP_REST_Response
	 */
	public function get_items( $request ) {

		$page = $request->get_param( 'page' );
		$items = array(); //@todo GravityView internal

		if( empty( $items ) ) {
			return new WP_Error( 'gravityview-no-views', __( 'No views found.', 'gravityview' ) ); //@todo message
		}

		$data = array();
		foreach( $items as $item ) {
			$data[] = $this->prepare_item_for_response( $item, $request );

		}

		return new WP_REST_Response( $data, 200 );

	}

	/**
	 * Get one view
	 *
	 * Callback for /v1/views/{id}/
	 *
	 * @since 1.14.4
	 * @param WP_REST_Request $request Full data about the request.
	 * @return WP_Error|WP_REST_Response
	 */
	public function get_item( $request ) {


		$item = array(); //@todo GravityView internal

		//return a response or error based on some conditional
		if ( ! is_wp_error( $item ) ) {
			$data = $this->prepare_item_for_response( $item, $request );

			return new WP_REST_Response( $data, 200 );
		}else{
			return new WP_Error( 'code', __( 'Fail Message', 'gravityview' ) ); //@todo message
		}

	}

	/**
	 * Get entries from a view
	 *
	 * Callback for /v1/views/{id}/entries/
	 *
	 * @since 1.14.4
	 * @param WP_REST_Request $request Full data about the request.
	 * @return WP_Error|WP_REST_Response
	 */
	public function get_sub_items( $request ) {

		$page = $request->get_param( 'page' );
		$items = array(); //@todo GravityView internal

		if( empty( $items ) ) {
			return new WP_Error( 'gravityview-no-views', __( 'No views found.', 'gravityview' ) ); //@todo message
		}

		$data = array();
		foreach( $items as $item ) {
			$data[] = $this->prepare_item_for_response( $item, $request );

		}

		return new WP_REST_Response( $data, 200 );

	}

	/**
	 * Get one entry from view
	 *
	 * Callback for /v1/views/{id}/entries/{id}/
	 *
	 * @since 1.14.4
	 * @param WP_REST_Request $request Full data about the request.
	 * @return WP_Error|WP_REST_Response
	 */
	public function get_sub_item( $request ) {


		$item = array(); //@todo GravityView internal

		//return a response or error based on some conditional
		if ( ! is_wp_error( $item ) ) {
			$data = $this->prepare_item_for_response( $item, $request );

			return new WP_REST_Response( $data, 200 );
		}else{
			return new WP_Error( 'code', __( 'Fail Message', 'gravityview' ) ); //@todo message
		}

	}

}