<?php

namespace Lullabot\Mpx\DataService\Media;

use GuzzleHttp\Psr7\Uri;
use Lullabot\Mpx\DataService\Annotation\DataService;
use Lullabot\Mpx\DataService\NullDateTime;
use Lullabot\Mpx\DataService\ObjectBase;
use Lullabot\Mpx\DataService\PublicIdentifierInterface;
use Psr\Http\Message\UriInterface;

/**
 * Implements the Media endpoint in the Media data service.
 *
 * @see https://docs.theplatform.com/help/media-media-object
 *
 * @todo Typehint all of the set methods.
 *
 * @DataService(
 *   service="Media Data Service",
 *   schemaVersion="1.10",
 *   objectType="Media",
 * )
 */
class Media extends ObjectBase implements PublicIdentifierInterface
{
    /**
     * The id of the AdPolicy associated with this content.
     *
     * @var \Psr\Http\Message\UriInterface
     */
    protected $adPolicyId;

    /**
     * The date and time that this object was created.
     *
     * @var \Lullabot\Mpx\DataService\DateTimeFormatInterface
     */
    protected $added;

    /**
     * The id of the user that created this object.
     *
     * @var \Psr\Http\Message\UriInterface
     */
    protected $addedByUserId;

    /**
     * The administrative workflow tags for this object.
     *
     * @var string[]
     */
    protected $adminTags = [];

    /**
     * Whether this content is approved for playback.
     *
     * @var bool
     */
    protected $approved;

    /**
     * The creator of this content.
     *
     * @var string
     */
    protected $author;

    /**
     * A map that contains localized versions of this object's author value.
     *
     * @var array
     */
    protected $authorLocalized;

    /**
     * The computed availability of the media for playback.
     *
     * @var string
     */
    protected $availabilityState;

    /**
     * The playback availability tags for this media.
     *
     * @var string[]
     */
    protected $availabilityTags = [];

    /**
     * An array of distinct time frames that identify the playback availability for this media.
     *
     * @var AvailabilityWindow[]
     */
    protected $availabilityWindows = [];

    /**
     * The date that this content becomes available for playback.
     *
     * @var \Lullabot\Mpx\DataService\DateTimeFormatInterface
     */
    protected $availableDate;

    /**
     * The Category objects that this object is associated with, represented as CategoryInfo objects.
     *
     * @var CategoryInfo[]
     */
    protected $categories = [];

    /**
     * The id values of the Category objects that this object is associated with.
     *
     * @var \Psr\Http\Message\UriInterface[]
     */
    protected $categoryIds = [];

    /**
     * Chapter information for this content.
     *
     * @var Chapter[]
     */
    protected $chapters = [];

    /**
     * The content MediaFile objects that this object is associated with.
     *
     * @var MediaFile[]
     */
    protected $content = [];

    /**
     * The copyright holder of this content.
     *
     * @var string
     */
    protected $copyright;

    /**
     * A map that contains localized versions of this object's copyright value.
     *
     * @var array
     */
    protected $copyrightLocalized;

    /**
     * The URL of a copyright statement or terms of use.
     *
     * @var string
     */
    protected $copyrightUrl;

    /**
     * A map that contains localized versions of this object's copyrightUrl value.
     *
     * @var array
     */
    protected $copyrightUrlLocalized;

    /**
     * The list of ISO 3166 country codes that geo-targeting restrictions apply to.
     *
     * @var string[]
     */
    protected $countries = [];

    /**
     * The creative credits for this content.
     *
     * @var Credit[]
     */
    protected $credits = [];

    /**
     * The streamingUrl of the default thumbnail for this Media.
     *
     * @var Uri
     */
    protected $defaultThumbnailUrl;

    /**
     * A description of this content.
     *
     * @var string
     */
    protected $description;

    /**
     * A map that contains localized versions of this object's description value.
     *
     * @var array
     */
    protected $descriptionLocalized;

    /**
     * Whether the specified countries are excluded from playing this content.
     *
     * @var bool
     */
    protected $excludeCountries;

    /**
     * The date that this content expires and is no longer available for playback.
     *
     * @var \Lullabot\Mpx\DataService\DateTimeFormatInterface
     */
    protected $expirationDate;

    /**
     * Reserved for future use.
     *
     * @var \Psr\Http\Message\UriInterface
     */
    protected $fileSourceMediaId;

    /**
     * An alternate identifier for this object that is unique within the owning account.
     *
     * @var string
     */
    protected $guid;

    /**
     * The globally unique URI of this object.
     *
     * @var \Psr\Http\Message\UriInterface
     */
    protected $id;

    /**
     * A list of internal keywords that describe this content.
     *
     * @var string
     */
    protected $keywords;

    /**
     * A map that contains localized versions of this object's keywords value.
     *
     * @var array
     */
    protected $keywordsLocalized;

    /**
     * A link to additional information related to this content.
     *
     * @var string
     */
    protected $link;

    /**
     * A map that contains localized versions of this object's link value.
     *
     * @var array
     */
    protected $linkLocalized;

    /**
     * Whether this object currently allows updates.
     *
     * @var bool
     */
    protected $locked;

    /**
     * The id values of the source Media objects that were shared to create this Media.
     *
     * @var \Psr\Http\Message\UriInterface[]
     */
    protected $originalMediaIds = [];

    /**
     * The id values of the accounts that shared this Media.
     *
     * @var \Psr\Http\Message\UriInterface[]
     */
    protected $originalOwnerIds = [];

    /**
     * The id of the account that owns this object.
     *
     * @var \Psr\Http\Message\UriInterface
     */
    protected $ownerId;

    /**
     * The globally unique public identifier for this media.
     *
     * @var string
     */
    protected $pid;

    /**
     * The ID of the Program that represents this media. The GUID URI is recommended.
     *
     * @var \Psr\Http\Message\UriInterface
     */
    protected $programId;

    /**
     * The title of the Provider that represents the account that shared this Media.
     *
     * @var string
     */
    protected $provider;

    /**
     * The id of the Provider that represents the account that shared this Media.
     *
     * @var \Psr\Http\Message\UriInterface
     */
    protected $providerId;

    /**
     * The original release date or airdate of this Media object's content.
     *
     * @var \Lullabot\Mpx\DataService\DateTimeFormatInterface
     */
    protected $pubDate;

    /**
     * The public URL for this media.
     *
     * @var Uri
     */
    protected $publicUrl;

    /**
     * The advisory ratings associated with this content.
     *
     * @var Rating[]
     */
    protected $ratings = [];

    /**
     * The id of the Restriction associated with this content.
     *
     * @var \Psr\Http\Message\UriInterface
     */
    protected $restrictionId;

    /**
     * The ID of the Program that represents the series to which this media belongs. The GUID URI is recommended.
     *
     * @var \Psr\Http\Message\UriInterface
     */
    protected $seriesId;

    /**
     * Text associated with this content.
     *
     * @var string
     */
    protected $text;

    /**
     * A map that contains localized versions of this object's text value.
     *
     * @var array
     */
    protected $textLocalized;

    /**
     * The thumbnail MediaFile objects that this object is associated with.
     *
     * @var MediaFile[]
     */
    protected $thumbnails = [];

    /**
     * The name of this object.
     *
     * @var string
     */
    protected $title;

    /**
     * A map that contains localized versions of this object's title value.
     *
     * @var array
     */
    protected $titleLocalized;

    /**
     * The date and time this object was last modified.
     *
     * @var \Lullabot\Mpx\DataService\DateTimeFormatInterface
     */
    protected $updated;

    /**
     * The id of the user that last modified this object.
     *
     * @var \Psr\Http\Message\UriInterface
     */
    protected $updatedByUserId;

    /**
     * This object's modification version, used for optimistic locking.
     *
     * @var int
     */
    protected $version;

    /**
     * Returns the id of the AdPolicy associated with this content.
     *
     * @return \Psr\Http\Message\UriInterface
     */
    public function getAdPolicyId(): \Psr\Http\Message\UriInterface
    {
        if (!$this->adPolicyId) {
            return new Uri();
        }

        return $this->adPolicyId;
    }

    /**
     * Set the id of the AdPolicy associated with this content.
     *
     * @param \Psr\Http\Message\UriInterface $adPolicyId
     */
    public function setAdPolicyId(\Psr\Http\Message\UriInterface $adPolicyId)
    {
        $this->adPolicyId = $adPolicyId;
    }

    /**
     * Returns the date and time that this object was created.
     *
     * @return \Lullabot\Mpx\DataService\DateTimeFormatInterface
     */
    public function getAdded(): \Lullabot\Mpx\DataService\DateTimeFormatInterface
    {
        if (!$this->added) {
            return new NullDateTime();
        }

        return $this->added;
    }

    /**
     * Set the date and time that this object was created.
     *
     * @param \Lullabot\Mpx\DataService\DateTimeFormatInterface $added
     */
    public function setAdded(\Lullabot\Mpx\DataService\DateTimeFormatInterface $added)
    {
        $this->added = $added;
    }

    /**
     * Returns the id of the user that created this object.
     *
     * @return \Psr\Http\Message\UriInterface
     */
    public function getAddedByUserId(): \Psr\Http\Message\UriInterface
    {
        if (!$this->addedByUserId) {
            return new Uri();
        }

        return $this->addedByUserId;
    }

    /**
     * Set the id of the user that created this object.
     *
     * @param \Psr\Http\Message\UriInterface $addedByUserId
     */
    public function setAddedByUserId(\Psr\Http\Message\UriInterface $addedByUserId)
    {
        $this->addedByUserId = $addedByUserId;
    }

    /**
     * Returns the administrative workflow tags for this object.
     *
     * @return string[]
     */
    public function getAdminTags(): array
    {
        return $this->adminTags;
    }

    /**
     * Set the administrative workflow tags for this object.
     *
     * @param string[] $adminTags
     */
    public function setAdminTags(array $adminTags)
    {
        $this->adminTags = $adminTags;
    }

    /**
     * Returns whether this content is approved for playback.
     *
     * @return bool
     */
    public function getApproved(): ?bool
    {
        return $this->approved;
    }

    /**
     * Set whether this content is approved for playback.
     *
     * @param bool $approved
     */
    public function setApproved(?bool $approved)
    {
        $this->approved = $approved;
    }

    /**
     * Returns the creator of this content.
     *
     * @return string
     */
    public function getAuthor(): ?string
    {
        return $this->author;
    }

    /**
     * Set the creator of this content.
     *
     * @param string $author
     */
    public function setAuthor(?string $author)
    {
        $this->author = $author;
    }

    /**
     * Returns a map that contains localized versions of this object's author value.
     *
     * @return array
     */
    public function getAuthorLocalized(): array
    {
        return $this->authorLocalized;
    }

    /**
     * Set a map that contains localized versions of this object's author value.
     *
     * @param array $authorLocalized
     */
    public function setAuthorLocalized(array $authorLocalized)
    {
        $this->authorLocalized = $authorLocalized;
    }

    /**
     * Returns the computed availability of the media for playback.
     *
     * @return string
     */
    public function getAvailabilityState(): ?string
    {
        return $this->availabilityState;
    }

    /**
     * Set the computed availability of the media for playback.
     *
     * @param string $availabilityState
     */
    public function setAvailabilityState(?string $availabilityState)
    {
        $this->availabilityState = $availabilityState;
    }

    /**
     * Returns the playback availability tags for this media.
     *
     * @return string[]
     */
    public function getAvailabilityTags(): array
    {
        return $this->availabilityTags;
    }

    /**
     * Set the playback availability tags for this media.
     *
     * @param string[] $availabilityTags
     */
    public function setAvailabilityTags(array $availabilityTags)
    {
        $this->availabilityTags = $availabilityTags;
    }

    /**
     * Returns an array of distinct time frames that identify the playback availability for this media.
     *
     * @return AvailabilityWindow[]
     */
    public function getAvailabilityWindows(): array
    {
        return $this->availabilityWindows;
    }

    /**
     * Set an array of distinct time frames that identify the playback availability for this media.
     *
     * @param AvailabilityWindow[] $availabilityWindows
     */
    public function setAvailabilityWindows(array $availabilityWindows)
    {
        $this->availabilityWindows = $availabilityWindows;
    }

    /**
     * Returns the date that this content becomes available for playback.
     *
     * @return \Lullabot\Mpx\DataService\DateTimeFormatInterface
     */
    public function getAvailableDate(): \Lullabot\Mpx\DataService\DateTimeFormatInterface
    {
        if (!$this->availableDate) {
            return new NullDateTime();
        }

        return $this->availableDate;
    }

    /**
     * Set the date that this content becomes available for playback.
     *
     * @param \Lullabot\Mpx\DataService\DateTimeFormatInterface $availableDate
     */
    public function setAvailableDate(\Lullabot\Mpx\DataService\DateTimeFormatInterface $availableDate)
    {
        $this->availableDate = $availableDate;
    }

    /**
     * Returns the Category objects that this object is associated with, represented as CategoryInfo objects.
     *
     * @return CategoryInfo[]
     */
    public function getCategories(): array
    {
        return $this->categories;
    }

    /**
     * Set the Category objects that this object is associated with, represented as CategoryInfo objects.
     *
     * @param CategoryInfo[] $categories
     */
    public function setCategories(array $categories)
    {
        $this->categories = $categories;
    }

    /**
     * Returns the id values of the Category objects that this object is associated with.
     *
     * @return \Psr\Http\Message\UriInterface[]
     */
    public function getCategoryIds(): array
    {
        return $this->categoryIds;
    }

    /**
     * Set the id values of the Category objects that this object is associated with.
     *
     * @param \Psr\Http\Message\UriInterface[] $categoryIds
     */
    public function setCategoryIds(array $categoryIds)
    {
        $this->categoryIds = $categoryIds;
    }

    /**
     * Returns chapter information for this content.
     *
     * @return Chapter[]
     */
    public function getChapters(): array
    {
        return $this->chapters;
    }

    /**
     * Set chapter information for this content.
     *
     * @param Chapter[] $chapters
     */
    public function setChapters(array $chapters)
    {
        $this->chapters = $chapters;
    }

    /**
     * Returns the content MediaFile objects that this object is associated with.
     *
     * @return MediaFile[]
     */
    public function getContent(): array
    {
        return $this->content;
    }

    /**
     * Set the content MediaFile objects that this object is associated with.
     *
     * @param MediaFile[] $content
     */
    public function setContent(array $content)
    {
        $this->content = $content;
    }

    /**
     * Returns the copyright holder of this content.
     *
     * @return string
     */
    public function getCopyright(): ?string
    {
        return $this->copyright;
    }

    /**
     * Set the copyright holder of this content.
     *
     * @param string $copyright
     */
    public function setCopyright(?string $copyright)
    {
        $this->copyright = $copyright;
    }

    /**
     * Returns a map that contains localized versions of this object's copyright value.
     *
     * @return array
     */
    public function getCopyrightLocalized(): array
    {
        return $this->copyrightLocalized;
    }

    /**
     * Set a map that contains localized versions of this object's copyright value.
     *
     * @param array $copyrightLocalized
     */
    public function setCopyrightLocalized(array $copyrightLocalized)
    {
        $this->copyrightLocalized = $copyrightLocalized;
    }

    /**
     * Returns the URL of a copyright statement or terms of use.
     *
     * @return string
     */
    public function getCopyrightUrl(): ?string
    {
        return $this->copyrightUrl;
    }

    /**
     * Set the URL of a copyright statement or terms of use.
     *
     * @param string $copyrightUrl
     */
    public function setCopyrightUrl(?string $copyrightUrl)
    {
        $this->copyrightUrl = $copyrightUrl;
    }

    /**
     * Returns a map that contains localized versions of this object's copyrightUrl value.
     *
     * @return array
     */
    public function getCopyrightUrlLocalized(): array
    {
        return $this->copyrightUrlLocalized;
    }

    /**
     * Set a map that contains localized versions of this object's copyrightUrl value.
     *
     * @param array $copyrightUrlLocalized
     */
    public function setCopyrightUrlLocalized(array $copyrightUrlLocalized)
    {
        $this->copyrightUrlLocalized = $copyrightUrlLocalized;
    }

    /**
     * Returns the list of ISO 3166 country codes that geo-targeting restrictions apply to.
     *
     * @return string[]
     */
    public function getCountries(): array
    {
        return $this->countries;
    }

    /**
     * Set the list of ISO 3166 country codes that geo-targeting restrictions apply to.
     *
     * @param string[] $countries
     */
    public function setCountries(array $countries)
    {
        $this->countries = $countries;
    }

    /**
     * Returns the creative credits for this content.
     *
     * @return Credit[]
     */
    public function getCredits(): array
    {
        return $this->credits;
    }

    /**
     * Set the creative credits for this content.
     *
     * @param Credit[] $credits
     */
    public function setCredits(array $credits)
    {
        $this->credits = $credits;
    }

    /**
     * Returns the streamingUrl of the default thumbnail for this Media.
     *
     * @return Uri
     */
    public function getDefaultThumbnailUrl(): Uri
    {
        return $this->defaultThumbnailUrl;
    }

    /**
     * Set the streamingUrl of the default thumbnail for this Media.
     *
     * @param Uri
     */
    public function setDefaultThumbnailUrl($defaultThumbnailUrl)
    {
        $this->defaultThumbnailUrl = $defaultThumbnailUrl;
    }

    /**
     * Returns a description of this content.
     *
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Set a description of this content.
     *
     * @param string $description
     */
    public function setDescription(?string $description)
    {
        $this->description = $description;
    }

    /**
     * Returns a map that contains localized versions of this object's description value.
     *
     * @return array
     */
    public function getDescriptionLocalized(): array
    {
        return $this->descriptionLocalized;
    }

    /**
     * Set a map that contains localized versions of this object's description value.
     *
     * @param array $descriptionLocalized
     */
    public function setDescriptionLocalized(array $descriptionLocalized)
    {
        $this->descriptionLocalized = $descriptionLocalized;
    }

    /**
     * Returns whether the specified countries are excluded from playing this content.
     *
     * @return bool
     */
    public function getExcludeCountries(): ?bool
    {
        return $this->excludeCountries;
    }

    /**
     * Set whether the specified countries are excluded from playing this content.
     *
     * @param bool $excludeCountries
     */
    public function setExcludeCountries(?bool $excludeCountries)
    {
        $this->excludeCountries = $excludeCountries;
    }

    /**
     * Returns the date that this content expires and is no longer available for playback.
     *
     * @return \Lullabot\Mpx\DataService\DateTimeFormatInterface
     */
    public function getExpirationDate(): \Lullabot\Mpx\DataService\DateTimeFormatInterface
    {
        if (!$this->expirationDate) {
            return new NullDateTime();
        }

        return $this->expirationDate;
    }

    /**
     * Set the date that this content expires and is no longer available for playback.
     *
     * @param \Lullabot\Mpx\DataService\DateTimeFormatInterface $expirationDate
     */
    public function setExpirationDate(\Lullabot\Mpx\DataService\DateTimeFormatInterface $expirationDate)
    {
        $this->expirationDate = $expirationDate;
    }

    /**
     * Returns reserved for future use.
     *
     * @return \Psr\Http\Message\UriInterface
     */
    public function getFileSourceMediaId(): \Psr\Http\Message\UriInterface
    {
        if (!$this->fileSourceMediaId) {
            return new Uri();
        }

        return $this->fileSourceMediaId;
    }

    /**
     * Set reserved for future use.
     *
     * @param \Psr\Http\Message\UriInterface $fileSourceMediaId
     */
    public function setFileSourceMediaId(\Psr\Http\Message\UriInterface $fileSourceMediaId)
    {
        $this->fileSourceMediaId = $fileSourceMediaId;
    }

    /**
     * Returns an alternate identifier for this object that is unique within the owning account.
     *
     * @return string
     */
    public function getGuid(): ?string
    {
        return $this->guid;
    }

    /**
     * Set an alternate identifier for this object that is unique within the owning account.
     *
     * @param string $guid
     */
    public function setGuid(?string $guid)
    {
        $this->guid = $guid;
    }

    /**
     * Returns the globally unique URI of this object.
     *
     * @return \Psr\Http\Message\UriInterface
     */
    public function getId(): \Psr\Http\Message\UriInterface
    {
        if (!$this->id) {
            return new Uri();
        }

        return $this->id;
    }

    /**
     * Set the globally unique URI of this object.
     *
     * @param \Psr\Http\Message\UriInterface $id
     */
    public function setId(\Psr\Http\Message\UriInterface $id)
    {
        $this->id = $id;
    }

    /**
     * Returns a list of internal keywords that describe this content.
     *
     * @return string
     */
    public function getKeywords(): ?string
    {
        return $this->keywords;
    }

    /**
     * Set a list of internal keywords that describe this content.
     *
     * @param string $keywords
     */
    public function setKeywords(?string $keywords)
    {
        $this->keywords = $keywords;
    }

    /**
     * Returns a map that contains localized versions of this object's keywords value.
     *
     * @return array
     */
    public function getKeywordsLocalized(): array
    {
        return $this->keywordsLocalized;
    }

    /**
     * Set a map that contains localized versions of this object's keywords value.
     *
     * @param array $keywordsLocalized
     */
    public function setKeywordsLocalized(array $keywordsLocalized)
    {
        $this->keywordsLocalized = $keywordsLocalized;
    }

    /**
     * Returns a link to additional information related to this content.
     *
     * @return string
     */
    public function getLink(): ?string
    {
        return $this->link;
    }

    /**
     * Set a link to additional information related to this content.
     *
     * @param string $link
     */
    public function setLink(?string $link)
    {
        $this->link = $link;
    }

    /**
     * Returns a map that contains localized versions of this object's link value.
     *
     * @return array
     */
    public function getLinkLocalized(): array
    {
        return $this->linkLocalized;
    }

    /**
     * Set a map that contains localized versions of this object's link value.
     *
     * @param array $linkLocalized
     */
    public function setLinkLocalized(array $linkLocalized)
    {
        $this->linkLocalized = $linkLocalized;
    }

    /**
     * Returns whether this object currently allows updates.
     *
     * @return bool
     */
    public function getLocked(): ?bool
    {
        return $this->locked;
    }

    /**
     * Set whether this object currently allows updates.
     *
     * @param bool $locked
     */
    public function setLocked(?bool $locked)
    {
        $this->locked = $locked;
    }

    /**
     * Returns the id values of the source Media objects that were shared to create this Media.
     *
     * @return \Psr\Http\Message\UriInterface[]
     */
    public function getOriginalMediaIds(): array
    {
        return $this->originalMediaIds;
    }

    /**
     * Set the id values of the source Media objects that were shared to create this Media.
     *
     * @param \Psr\Http\Message\UriInterface[] $originalMediaIds
     */
    public function setOriginalMediaIds(array $originalMediaIds)
    {
        $this->originalMediaIds = $originalMediaIds;
    }

    /**
     * Returns the id values of the accounts that shared this Media.
     *
     * @return \Psr\Http\Message\UriInterface[]
     */
    public function getOriginalOwnerIds(): array
    {
        return $this->originalOwnerIds;
    }

    /**
     * Set the id values of the accounts that shared this Media.
     *
     * @param \Psr\Http\Message\UriInterface[] $originalOwnerIds
     */
    public function setOriginalOwnerIds(array $originalOwnerIds)
    {
        $this->originalOwnerIds = $originalOwnerIds;
    }

    /**
     * Returns the id of the account that owns this object.
     *
     * @return \Psr\Http\Message\UriInterface
     */
    public function getOwnerId(): \Psr\Http\Message\UriInterface
    {
        if (!$this->ownerId) {
            return new Uri();
        }

        return $this->ownerId;
    }

    /**
     * Set the id of the account that owns this object.
     *
     * @param \Psr\Http\Message\UriInterface $ownerId
     */
    public function setOwnerId(\Psr\Http\Message\UriInterface $ownerId)
    {
        $this->ownerId = $ownerId;
    }

    /**
     * Returns the globally unique public identifier for this media.
     *
     * @return string
     */
    public function getPid(): ?string
    {
        return $this->pid;
    }

    /**
     * Set the globally unique public identifier for this media.
     *
     * @param string $pid
     */
    public function setPid(?string $pid)
    {
        $this->pid = $pid;
    }

    /**
     * Returns the ID of the Program that represents this media. The GUID URI is recommended.
     *
     * @return \Psr\Http\Message\UriInterface
     */
    public function getProgramId(): \Psr\Http\Message\UriInterface
    {
        if (!$this->programId) {
            return new Uri();
        }

        return $this->programId;
    }

    /**
     * Set the ID of the Program that represents this media. The GUID URI is recommended.
     *
     * @param \Psr\Http\Message\UriInterface $programId
     */
    public function setProgramId(\Psr\Http\Message\UriInterface $programId)
    {
        $this->programId = $programId;
    }

    /**
     * Returns the title of the Provider that represents the account that shared this Media.
     *
     * @return string
     */
    public function getProvider(): ?string
    {
        return $this->provider;
    }

    /**
     * Set the title of the Provider that represents the account that shared this Media.
     *
     * @param string $provider
     */
    public function setProvider(?string $provider)
    {
        $this->provider = $provider;
    }

    /**
     * Returns the id of the Provider that represents the account that shared this Media.
     *
     * @return \Psr\Http\Message\UriInterface
     */
    public function getProviderId(): \Psr\Http\Message\UriInterface
    {
        if (!$this->providerId) {
            return new Uri();
        }

        return $this->providerId;
    }

    /**
     * Set the id of the Provider that represents the account that shared this Media.
     *
     * @param \Psr\Http\Message\UriInterface $providerId
     */
    public function setProviderId(\Psr\Http\Message\UriInterface $providerId)
    {
        $this->providerId = $providerId;
    }

    /**
     * Returns the original release date or airdate of this Media object's content.
     *
     * @return \Lullabot\Mpx\DataService\DateTimeFormatInterface
     */
    public function getPubDate(): \Lullabot\Mpx\DataService\DateTimeFormatInterface
    {
        if (!$this->pubDate) {
            return new NullDateTime();
        }

        return $this->pubDate;
    }

    /**
     * Set the original release date or airdate of this Media object's content.
     *
     * @param \Lullabot\Mpx\DataService\DateTimeFormatInterface $pubDate
     */
    public function setPubDate(\Lullabot\Mpx\DataService\DateTimeFormatInterface $pubDate)
    {
        $this->pubDate = $pubDate;
    }

    /**
     * Returns the public URL for this media.
     *
     * @return Uri
     */
    public function getPublicUrl(): Uri
    {
        return $this->publicUrl;
    }

    /**
     * Set the public URL for this media.
     *
     * @param Uri $publicUrl
     */
    public function setPublicUrl(Uri $publicUrl)
    {
        $this->publicUrl = $publicUrl;
    }

    /**
     * Returns the advisory ratings associated with this content.
     *
     * @return Rating[]
     */
    public function getRatings(): array
    {
        return $this->ratings;
    }

    /**
     * Set the advisory ratings associated with this content.
     *
     * @param Rating[] $ratings
     */
    public function setRatings(array $ratings)
    {
        $this->ratings = $ratings;
    }

    /**
     * Returns the id of the Restriction associated with this content.
     *
     * @return \Psr\Http\Message\UriInterface
     */
    public function getRestrictionId(): \Psr\Http\Message\UriInterface
    {
        if (!$this->restrictionId) {
            return new Uri();
        }

        return $this->restrictionId;
    }

    /**
     * Set the id of the Restriction associated with this content.
     *
     * @param \Psr\Http\Message\UriInterface $restrictionId
     */
    public function setRestrictionId(\Psr\Http\Message\UriInterface $restrictionId)
    {
        $this->restrictionId = $restrictionId;
    }

    /**
     * Returns the ID of the Program that represents the series to which this media belongs. The GUID URI is recommended.
     *
     * @return \Psr\Http\Message\UriInterface
     */
    public function getSeriesId(): \Psr\Http\Message\UriInterface
    {
        if (!$this->seriesId) {
            return new Uri();
        }

        return $this->seriesId;
    }

    /**
     * Set the ID of the Program that represents the series to which this media belongs. The GUID URI is recommended.
     *
     * @param \Psr\Http\Message\UriInterface $seriesId
     */
    public function setSeriesId(\Psr\Http\Message\UriInterface $seriesId)
    {
        $this->seriesId = $seriesId;
    }

    /**
     * Returns text associated with this content.
     *
     * @return string
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * Set text associated with this content.
     *
     * @param string $text
     */
    public function setText(?string $text)
    {
        $this->text = $text;
    }

    /**
     * Returns a map that contains localized versions of this object's text value.
     *
     * @return array
     */
    public function getTextLocalized(): array
    {
        return $this->textLocalized;
    }

    /**
     * Set a map that contains localized versions of this object's text value.
     *
     * @param array $textLocalized
     */
    public function setTextLocalized(array $textLocalized)
    {
        $this->textLocalized = $textLocalized;
    }

    /**
     * Returns the thumbnail MediaFile objects that this object is associated with.
     *
     * @return MediaFile[]
     */
    public function getThumbnails(): array
    {
        return $this->thumbnails;
    }

    /**
     * Set the thumbnail MediaFile objects that this object is associated with.
     *
     * @param MediaFile[] $thumbnails
     */
    public function setThumbnails(array $thumbnails)
    {
        $this->thumbnails = $thumbnails;
    }

    /**
     * Returns the name of this object.
     *
     * @return string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Set the name of this object.
     *
     * @param string $title
     */
    public function setTitle(?string $title)
    {
        $this->title = $title;
    }

    /**
     * Returns a map that contains localized versions of this object's title value.
     *
     * @return array
     */
    public function getTitleLocalized(): array
    {
        return $this->titleLocalized;
    }

    /**
     * Set a map that contains localized versions of this object's title value.
     *
     * @param array $titleLocalized
     */
    public function setTitleLocalized(array $titleLocalized)
    {
        $this->titleLocalized = $titleLocalized;
    }

    /**
     * Returns the date and time this object was last modified.
     *
     * @return \Lullabot\Mpx\DataService\DateTimeFormatInterface
     */
    public function getUpdated(): \Lullabot\Mpx\DataService\DateTimeFormatInterface
    {
        if (!$this->updated) {
            return new NullDateTime();
        }

        return $this->updated;
    }

    /**
     * Set the date and time this object was last modified.
     *
     * @param \Lullabot\Mpx\DataService\DateTimeFormatInterface $updated
     */
    public function setUpdated(\Lullabot\Mpx\DataService\DateTimeFormatInterface $updated)
    {
        $this->updated = $updated;
    }

    /**
     * Returns the id of the user that last modified this object.
     *
     * @return \Psr\Http\Message\UriInterface
     */
    public function getUpdatedByUserId(): \Psr\Http\Message\UriInterface
    {
        if (!$this->updatedByUserId) {
            return new Uri();
        }

        return $this->updatedByUserId;
    }

    /**
     * Set the id of the user that last modified this object.
     *
     * @param \Psr\Http\Message\UriInterface $updatedByUserId
     */
    public function setUpdatedByUserId(\Psr\Http\Message\UriInterface $updatedByUserId)
    {
        $this->updatedByUserId = $updatedByUserId;
    }

    /**
     * Returns this object's modification version, used for optimistic locking.
     *
     * @return int
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * Set this object's modification version, used for optimistic locking.
     *
     * @param int $version
     */
    public function setVersion(?int $version)
    {
        $this->version = $version;
    }
}
