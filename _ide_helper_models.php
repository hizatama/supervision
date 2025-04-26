<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Model{
/**
 * App\Model\CheckHistory
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CheckHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CheckHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CheckHistory query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $revision
 * @property int $is_passed
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CheckHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CheckHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CheckHistory whereIsPassed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CheckHistory whereRevision($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CheckHistory whereUpdatedAt($value)
 */
	class CheckHistory extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\ResultMessage
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ResultMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ResultMessage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ResultMessage query()
 * @mixin \Eloquent
 */
	class ResultMessage extends \Eloquent {}
}

namespace App{
/**
 * App\FeedbackComment
 *
 * @property int $id
 * @property int $feedback_image_id
 * @property int $x
 * @property int $y
 * @property int $width
 * @property int $height
 * @property string $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FeedbackComment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FeedbackComment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FeedbackComment query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FeedbackComment whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FeedbackComment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FeedbackComment whereFeedbackImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FeedbackComment whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FeedbackComment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FeedbackComment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FeedbackComment whereWidth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FeedbackComment whereX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FeedbackComment whereY($value)
 */
	class FeedbackComment extends \Eloquent {}
}

namespace App{
/**
 * App\FeedbackImage
 *
 * @property int $id
 * @property int $feedback_id
 * @property string $title
 * @property string $filename
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FeedbackImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FeedbackImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FeedbackImage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FeedbackImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FeedbackImage whereFeedbackId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FeedbackImage whereFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FeedbackImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FeedbackImage whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FeedbackImage whereUpdatedAt($value)
 */
	class FeedbackImage extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\SiteMapPage
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMapPage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMapPage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMapPage query()
 * @mixin \Eloquent
 * @property int $id
 * @property string|null $path
 * @property string $name
 * @property string|null $title
 * @property int $title_use_common
 * @property string|null $keywords
 * @property int $keywords_use_common
 * @property string|null $description
 * @property int $description_use_common
 * @property string|null $og_title
 * @property int $og_title_use_common
 * @property string|null $og_url
 * @property int $og_url_use_common
 * @property string|null $og_description
 * @property int $og_description_use_common
 * @property string|null $og_image
 * @property int $og_image_use_common
 * @property string|null $favicon
 * @property int $favicon_use_common
 * @property string|null $charset
 * @property int $charset_use_common
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMapPage whereCharset($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMapPage whereCharsetUseCommon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMapPage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMapPage whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMapPage whereDescriptionUseCommon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMapPage whereFavicon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMapPage whereFaviconUseCommon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMapPage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMapPage whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMapPage whereKeywordsUseCommon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMapPage whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMapPage whereOgDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMapPage whereOgDescriptionUseCommon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMapPage whereOgImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMapPage whereOgImageUseCommon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMapPage whereOgTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMapPage whereOgTitleUseCommon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMapPage whereOgUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMapPage whereOgUrlUseCommon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMapPage wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMapPage whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMapPage whereTitleUseCommon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMapPage whereUpdatedAt($value)
 */
	class SiteMapPage extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\CheckHistoryDetail
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CheckHistoryDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CheckHistoryDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CheckHistoryDetail query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $history_id
 * @property int $page_id
 * @property string $key
 * @property string $type
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CheckHistoryDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CheckHistoryDetail whereHistoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CheckHistoryDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CheckHistoryDetail whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CheckHistoryDetail whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CheckHistoryDetail wherePageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CheckHistoryDetail whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CheckHistoryDetail whereUpdatedAt($value)
 */
	class CheckHistoryDetail extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\SiteMap
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMap newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMap newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMap query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $url_production
 * @property string $url_staging
 * @property string|null $charset
 * @property string|null $title
 * @property string|null $title_prefix
 * @property string|null $title_suffix
 * @property string|null $keywords
 * @property string|null $description
 * @property string|null $og_title
 * @property string|null $og_url
 * @property string|null $og_description
 * @property string|null $og_image
 * @property string|null $favicon
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMap whereCharset($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMap whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMap whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMap whereFavicon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMap whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMap whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMap whereOgDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMap whereOgImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMap whereOgTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMap whereOgUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMap whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMap whereTitlePrefix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMap whereTitleSuffix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMap whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMap whereUrlProduction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMap whereUrlStaging($value)
 */
	class SiteMap extends \Eloquent {}
}

namespace App{
/**
 * App\Feedback
 *
 * @property int $id
 * @property string $key
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feedback newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feedback newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feedback query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feedback whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feedback whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feedback whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feedback whereUpdatedAt($value)
 */
	class Feedback extends \Eloquent {}
}

