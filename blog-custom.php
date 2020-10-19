<?php
/*
 * Plugin Name: 커스텀 플러그인
 * Description: 창우 블로그 커스텀 플러그인
 * Version:     1.0.0
 * Author:      남창우
 * Author URI:  https://blog.changwoo.pe.kr
 * Plugin URI:  https://github.com/chwnam/blog-custom.git
 * License:     GPLv2 or later
 */

function blog_custom_init() {
	register_post_type(
		'task_recipe',
		[
			'labels'              => [
				'name'                     => '업무 레시피들',
				'singular_name'            => '업무 레시피',
				'add_new'                  => '새로 작성',
				'add_new_item'             => '새 레시피 작성',
				'new_item'                 => '새 레시피',
				'view_item'                => '레시피 보기',
				'view_items'               => '레시피 보기',
				'edit_item'                => '레시피 수정',
				'search_items'             => '레시피 검색',
				'not_found'                => '레시피 찾을 수 없음.',
				'not_found_in_trash'       => '휴지통에서 레시피 찾을 수 없음.',
				'all_items'                => '모든 레시피',
				'archives'                 => '레시피 목록',
				'attributes'               => '레시피 속성',
				'insert_into_item'         => '레시피에 삽입',
				'uploaded_to_this_item'    => '이 레시피로 업로드',
				'menu_name'                => '업무 레시피',
				'filter_items_list'        => '레시피 목록 필터',
				'items_list_navigation'    => '레시피 목록 탐색',
				'items_list'               => '레시피 목록',
				'name_admin_bar'           => '레시피',
				'item_published'           => '레시피 발행됨',
				'item_published_privately' => '레시피가 비공개로 발행됨',
				'item_reverted_to_draft'   => '레시피 임시글로 변경됨',
				'item_scheduled'           => '레시피 발행 예약됨',
				'item_updated'             => '레시피 업데이트됨.',
			],
			'description'         => '레시피 포스트 타입',
			'public'              => true,
			'exclude_from_search' => false,
			'menu_position'       => 7,
			'menu_icon'           => 'dashicons-book-alt',
			'hierarchical'        => false,
			'supports'            => [ 'title', 'editor' ],
			'taxonomies'          => [ 'recipe_tag' ],
			'has_archive'         => true,
			'rewrite'             => [
				'slug'       => 'recipe',
				'with_front' => true,
				'feeds'      => false,
				'pages'      => true,
				'ep_mask'    => EP_PERMALINK,
			],
			'query_var'           => 'recipe',
			'can_export'          => true,
			'delete_with_user'    => false,
			'show_in_rest'        => true,
		]
	);

	register_taxonomy(
		'recipe_tag',
		[ 'task_recipe' ],
		[
			'labels'             => [
				'name'                       => '레시피 태그',
				'singular_name'              => '레시피 태그',
				'menu_name'                  => '레시피 태그',
				'all_items'                  => '모든 레시피',
				'edit_item'                  => '레시피 수정',
				'view_item'                  => '레시피 보기',
				'update_item'                => '레시피 갱신',
				'add_new_item'               => '새 레시피 추가',
				'new_item_name'              => '새 레시피 이름',
				'search_items'               => '레시피 검색',
				'popular_items'              => '자주 태그된 레시피들',
				'separate_items_with_commas' => '쉼표로 레시피를 구분',
				'add_or_remove_items'        => '레시피 추가 혹은 삭제',
				'choose_from_most_used'      => '가장 많이 사용된 레시피에서 선택',
				'not_found'                  => '찾을 수 없음',
				'back_to_items'              => '목록으로 돌하가기',
			],
			'public'             => true,
			'publicly_queryable' => true,
			'show_admin_column'  => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_nav_menus'  => false,
			'meta_box_cb'        => null,
			'show_in_rest'       => true,
			'description'        => '레시피 태그',
			'hierarchical'       => false,
			'query_var'          => 'recipe-tag',
			'rewrite'            => [
				'slug'         => 'recipe-tag',
				'with_front'   => true,
				'hierarchical' => false,
				'ep_mask'      => EP_NONE,
			],
		]
	);
}

add_action( 'init', 'blog_custom_init' );
