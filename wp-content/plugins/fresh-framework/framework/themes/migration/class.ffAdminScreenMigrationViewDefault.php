<?php
class ffAdminScreenMigrationViewDefault extends ffAdminScreenView {


	public function ajaxRequest( ffAdminScreenAjax $ajax ) {

//		var_dump( $ajax );
	}



	public function newAjaxRequest( ffAjaxRequest $ajaxRequest ) {

	}

	protected function _actionReplaceImages() {

		echo '<h1>Migrating images</h1>';

        $somethingReplaced = false;

		$posts = ffContainer()->getPostLayer()->getPostGetter()
			->setNumberOfPosts(-1)
//			->setOffset(45)
			->getPostsByType('any');

		$tbr = ffContainer()->getThemeFrameworkFactory()->getThemeBuilderRegexp();
//
		foreach( $posts as $onePost ) {
			$postContent = $onePost->getContent();

			$newContent = $tbr->imageFind( $postContent, array($this,'imageFound'));

			if( $tbr->getFoundImageInPost() ) {

				echo 'Replaced images here: ' . get_post_permalink($onePost->getID()) . '<br>';
                $somethingReplaced = true;

				$postUpdater = ffContainer()->getPostLayer()->getPostUpdater();
				$data = array();
				$data['ID'] = $onePost->getID();
				$data['post_content'] = $newContent;

				$postUpdater->updatePost($data);
				echo '<br><br><br>';
			}
		}


		$optionsCollection = ffContainer()->getDataStorageFactory()->createOptionsCollection();

		$optionsCollection->setNamespace('footer');
		$optionsCollection->addDefaultItemCallbacksFromThemeFolder();

		foreach( $optionsCollection as $oneItem ) {

			$postContent = $oneItem->get('builder');

			$newContent = $tbr->imageFind( $postContent, array($this,'imageFound'));

			if( $tbr->getFoundImageInPost() ) {
				echo 'Replaced images in footer ' . $oneItem->get('name');
                $somethingReplaced = true;
				$oneItem->set('builder', $newContent);
			}

		}

		$optionsCollection->save();

        $optionsCollection = ffContainer()->getDataStorageFactory()->createOptionsCollection();

        $optionsCollection->setNamespace('titlebar');
        $optionsCollection->addDefaultItemCallbacksFromThemeFolder();

        foreach( $optionsCollection as $oneItem ) {

            $postContent = $oneItem->get('builder');

            $newContent = $tbr->imageFind( $postContent, array($this,'imageFound'));

            if( $tbr->getFoundImageInPost() ) {
                echo 'Replaced images in titlebar ' . $oneItem->get('name');
                $somethingReplaced = true;
                $oneItem->set('builder', $newContent);
            }

        }

        $optionsCollection->save();

        if( $somethingReplaced == false ) {
            echo 'Nothing found';
        }

	}

	private $_replacedImages = array();

	public function imageFound( $image ) {




		$imageData = ffDataHolder( $image );

		$imageNewUrl = wp_get_attachment_url( $imageData->id );

		if( $imageData->url != $imageNewUrl ) {
			echo 'Image Replaced' . '<br>';
			echo 'Old URL : ' . $imageData->url . '<br>';
			echo 'New URL : ' .$imageNewUrl . '<br>';
			$image['url'] = $imageNewUrl;

			$imageData->new_url = $imageNewUrl;
			$this->_replacedImages[] = $imageData;

			return $image;
		}

		return null;
	}

	private function _actionReplaceUrl() {
        $somethingReplaced = false;

		echo '<h1>Replacing STRING</h1>';

		$reqeust = ffContainer()->getRequest();

		$oldUrl = $reqeust->post('ff-old-url');
		$newUrl = $reqeust->post('ff-new-url');

		$oldUrlEncoded = rawurlencode( $oldUrl );
		$newUrlEncoded = rawurlencode( $newUrl );

		$posts = ffContainer()->getPostLayer()->getPostGetter()
			->setNumberOfPosts(-1)
//			->setOffset(45)
			->getPostsByType('any');
//
//		$tbr = ffContainer()->getThemeFrameworkFactory()->getThemeBuilderRegexp();
////
		foreach( $posts as $onePost ) {
			$postContent = $onePost->getContent();

			$count = 0;
			$newContent = str_replace( $oldUrlEncoded, $newUrlEncoded, $postContent, $count);

			if( $count > 0 ) {
				echo 'Replaced string here: ' . get_post_permalink($onePost->getID()) . '<br>';
                $somethingReplaced = true;

				$postUpdater = ffContainer()->getPostLayer()->getPostUpdater();
				$data = array();
				$data['ID'] = $onePost->getID();
				$data['post_content'] = $newContent;
//
				$postUpdater->updatePost($data);
				echo '<br><br><br>';
			}

		}

		$optionsCollection = ffContainer()->getDataStorageFactory()->createOptionsCollection();

		$optionsCollection->setNamespace('footer');
		$optionsCollection->addDefaultItemCallbacksFromThemeFolder();

		foreach( $optionsCollection as $oneItem ) {

			$postContent = $oneItem->get('builder');

			$count = 0;
			$newContent = str_replace( $oldUrlEncoded, $newUrlEncoded, $postContent, $count);

			if( $count > 0 ) {
				echo 'Replaced images in footer ' . $oneItem->get('name');
                $somethingReplaced = true;
				$oneItem->set('builder', $newContent);
			}

		}

		$optionsCollection->save();

        $optionsCollection = ffContainer()->getDataStorageFactory()->createOptionsCollection();

        $optionsCollection->setNamespace('titlebar');
        $optionsCollection->addDefaultItemCallbacksFromThemeFolder();

        foreach( $optionsCollection as $oneItem ) {

            $postContent = $oneItem->get('builder');

            $count = 0;
            $newContent = str_replace( $oldUrlEncoded, $newUrlEncoded, $postContent, $count);

            if( $count > 0 ) {
                echo 'Replaced images in titlebar ' . $oneItem->get('name');
                $somethingReplaced = true;
                $oneItem->set('builder', $newContent);
            }

        }

        $optionsCollection->save();

        if( $somethingReplaced == false ) {
            echo 'Nothing found';
        }
	}


	protected function _render() {

		$request = ffContainer()->getRequest();

		echo '<div class="wrap about-wrap">';
		echo '<h1>Migration';
		echo ffArkAcademyHelper::getInfo(30);
		echo '</h1>';
		echo '<p class="about-text">When you are migrating your site from staging environment to your production server, this is the last step. It runs a database query in Ark data and replaces the old URLs with new URLs. <strong style="color:red;">You still need to do a standard migration process and replace URLs in your database first. This is only for Ark data which cannot be replaced with the standard migration process.</strong></strong></p>';
		echo '<p class="about-text">If you do not know what this tool does then you do not need it, so please do not use it because you can break your database.</p>';
		echo '<p class="about-text"><strong>NOTE: Currently, nothing in header is searched and replaced (mainly the logos), so you will need to re-do these manually via "Ark > Headers".</strong></p>';
		switch( $request->get('action', 'default') ) {
			case 'replace-images':
				$this->_actionReplaceImages();
				break;

			case 'replace-url':
				$this->_actionReplaceUrl();
				break;
		}

		$urlRewriter = ffContainer()->getUrlRewriter();


			// echo '<h2>Replace Images</h2>';

			echo '
			<h2 class="nav-tab-wrapper wp-clearfix">
				<a href="./admin.php?page=Migration" class="nav-tab nav-tab-active">Replace Images</a>
			</h2>
			';
			echo '<p><strong style="color:red;">!!! BACKUP YOUR DATABASE before using this tool !!! Incorrect usage of this tool will break your database !!!</strong></p>';
			echo '<p><a class="button button-primary" href="'. $urlRewriter->addQueryParameter('action', 'replace-images')->getNewUrl().'">Replace Images</a> - finds every image and replace it with correct url (good for http -> https or huge server migration)</p>';

			echo '<br><br>';
			// echo '<h2>Replace String</h2>';
			echo '
			<h2 class="nav-tab-wrapper wp-clearfix">
				<a href="./admin.php?page=Migration" class="nav-tab nav-tab-active">Replace String</a>
			</h2>
			';
			echo '<p><strong style="color:red;">!!! BACKUP YOUR DATABASE before using this tool !!! Incorrect usage of this tool will break your database !!!</strong></p>';
			echo '<p>This tool can also be used to replace old URL strings with new URLs strings</p>';
			echo '<form action="'. $urlRewriter->addQueryParameter('action', 'replace-url')->getNewUrl().'" method="POST">';
				echo '<p><input type="text" name="ff-old-url" class="ff-old-url"> - Old string (find)</p>';
//				echo '';
				echo '<p><input type="text" name="ff-new-url" class="ff-new-url"> - New string (replace with)</p>';
//				echo '';
//				echo '<br>';
				echo '<br>';
				echo '<input type="submit" class="button button-primary ff-replace-url-button" value="Replace URL">';
			echo '</form>';
//			echo '<p><a class="button" href="'. $urlRewriter->addQueryParameter('action', 'replace')->getNewUrl().'">Replace URL</a> - the actual replacing process</p>';
//		echo '<h1>Migration</h1>';
//			echo '<'
		echo '</div>';

		// search for image strings across website


	}



	protected function _requireAssets() {
		$themeBuilder = ffContainer()->getThemeFrameworkFactory()->getThemeBuilder();

		$themeBuilder->requireBuilderScriptsAndStyles();

//		$pluginUrl = ffPluginFreshMinificatorContainer::getInstance()->getPluginUrl();
//		$this->_getScriptEnqueuer()->addScript('ffAdminScreenMinificatorViewDefault', $pluginUrl .'/adminScreens/minificator/assets/adminScreen.js', array('jquery') );
//		$this->_getStyleEnqueuer()
//			->addStyleFramework('ff-dummy-content', '/framework/themes/dummy/adminScreen/style.css');

		$this->_getScriptEnqueuer()
			->addScriptFramework('ff-migration', '/framework/themes/migration/script.js');
	}


	protected function _setDependencies() {

	}

}