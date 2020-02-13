<?php

/**
 * Template
 * @var string
 */
class KkrouselClass extends \ContentElement {
    protected $strTemplate = 'ce_kkrousel';

    protected function compile() {
        $template = $this->Template;
        $imagesFolder = $this->imagesFolder;
        //Template ausgeben
        $this->Template = new \FrontendTemplate($this->strTemplate);
        $this->Template->class = "ce_kkrousel";

        $imagesFolder = deserialize($imagesFolder);
        $objFiles = \FilesModel::findMultipleByUuids($imagesFolder);

        global $objPage;
        $images = array();
        $auxDate = array();

        if ($objFiles !== null) {
            // Get all images
            while ($objFiles->next()) {
                // Continue if the files has been processed or does not exist
                if (isset($images[$objFiles->path]) || !file_exists(TL_ROOT . '/' . $objFiles->path)) {
                    continue;
                }

                // Single files
                if ($objFiles->type == 'file') {
                    $objFile = new \File($objFiles->path, true);

                    if (!$objFile->isGdImage) {
                        continue;
                    }

                    $arrMeta = $this->getMetaData($objFiles->meta, $objPage->language);

                    // Use the file name as title if none is given
                    if ($arrMeta['title'] == '') {
                        $arrMeta['title'] = specialchars(str_replace('_', ' ', $objFile->filename));
                    }

                    // Add the image
                    $images[$objFiles->path] = array
                    (
                        'id'           => $objFiles->id,
                        'uuid'         => $objFiles->uuid,
                        'name'         => $objFile->basename,
                        'thumbnailSRC' => \Image::get($this->urlEncode($objFiles->path), '100px', null, 'center_center'),
                        'title'        => $arrMeta['title'],
                        'imageUrl'     => $arrMeta['link'],
                        'alt'          => $arrMeta['caption']
                    );

                    $auxDate[] = $objFile->mtime;
                }
                // Folders
                else {

                    $objSubfiles = \FilesModel::findByPid($objFiles->uuid);

                    if ($objSubfiles === null) {
                        continue;
                    }

                    while ($objSubfiles->next()) {
                        // Skip subfolders
                        if ($objSubfiles->type == 'folder') {
                            continue;
                        }

                        $objFile = new \File($objSubfiles->path, true);

                        if (!$objFile->isGdImage) {
                            continue;
                        }

                        $arrMeta = $this->getMetaData($objSubfiles->meta, $objPage->language);

                        // Use the file name as title if none is given
                        if ($arrMeta['title'] == '') {
                            $arrMeta['title'] = specialchars(str_replace('_', ' ', $objFile->filename));
                        }

                        // Add the image
                        $images[$objSubfiles->path] = array
                        (
                            'id'           => $objSubfiles->id,
                            'uuid'         => $objSubfiles->uuid,
                            'name'         => $objFile->basename,
                            'path'         => $objSubfiles->path,
                            'thumbnailSRC' => \Image::get($this->urlEncode($objSubfiles->path), '100px', null, 'center_center'),
                            'title'        => $arrMeta['title'],
                            'imageUrl'     => $arrMeta['link'],
                            'alt'          => $arrMeta['caption']
                        );

                        $auxDate[] = $objFile->mtime;
                    }
                }
            }

            $pictures = array_values($images);
            $this->Template->pictures = $pictures;
            $total = count($pictures);
        } else {
            $total = 0;
        }

        /* Retrieve the current gallery images
        $objPictures = $database->prepare("SELECT * FROM tl_galerie_pictures WHERE pid=? AND published=1 ORDER BY sorting")
            ->execute($galerie);

        if ($objPictures->numRows > 0) {
            while ($objPictures->next()) {
                // Standard image
                $imgSize = deserialize($objPictures->size);
                $objImg = \FilesModel::findByUuid($objPictures->singleSRC);
                $imageSRC = \Image::get($this->urlEncode($objImg->path), $imgSize[0], $imgSize[1], $imgSize[2]);

                // Fullscreen image
                $objFullscreenImgSRC = \FilesModel::findByUuid($objPictures->fullscreenSingleSRC);

                // Thumbnails are created separately.
                $thumbSize = deserialize($objPictures->thumbSize);
                $objThumb = \FilesModel::findByUuid($objPictures->thumbSRC);

                // Is there an alternative thumbnail ? If not, we create the thumbnail from the main image.
                ($objThumb ? ($thumbnail = $objThumb->path) : ($thumbnail = $objImg->path));

                if ($thumbSize[0] == null && $thumbSize[1] == null) {
                    $thumbnailSRC = \Image::get($this->urlEncode($thumbnail), '100px', null, 'center_center');
                } else {
                    $thumbnailSRC = \Image::get($this->urlEncode($thumbnail), $thumbSize[0], $thumbSize[1], $thumbSize[2]);
                }

                $arrPictures[$objPictures->id] = array(
                    'alt'                   => $objPictures->alt,
                    'title'                 => $objPictures->title,
                    'imageUrl'              => $objPictures->imageUrl,
                    'imageSRC'              => $imageSRC,
                    'thumbnailSRC'          => $thumbnailSRC,
                    'imageFullscreenSRC'    => $this->urlEncode($objFullscreenImgSRC->path),
                    'video'                 => self::urlVerification($objPictures->video),
                    'iframe'                => $objPictures->iframe,
                    'iframeThumb'           => $objPictures->iframeThumb,
                    'layer'                 => htmlentities($objPictures->layerHTML, ENT_COMPAT, 'UTF-8'),
                    'dataConfig'            => $objPictures->dataConfigHTML
                );
            }

            $pictures = array_values($arrPictures);

            // Add a group of images
            if ($total > 0) {
                $pictures = array_merge($pictures, $images);
            }

            $template->pictures = $pictures;
        } elseif ($total > 0) {
            $template->pictures = $images;
        } else {
            $template->pictures = array();
            $template->noImages = $GLOBALS['TL_LANG']['MSC']['noImages'];
        } */
    }

}