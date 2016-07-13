![Screenshot](resources/screenshots/plugin_logo.png)

# EXIF | Craft CMS Plugin

Once set up you can save EXIF information with every asset element. Easily display EXIF data on the front-end.



## Installation

Download or clone repo and place into your `plugins` folder. Make sure the plugin folder is named `exif`.

* Create a custom field with `Exif` Field Type
* Add the new field to your Asset Sources -> Field Layout tab.

OR

[Watch Installation Video Here.](https://www.youtube.com/watch?v=-G-fCaOhCSY)


So... everytime you upload an asset to your assets or inside your entries it will automatically populate element with EXIF information. If you already have photos uploaded, double click the asset and hit `Update EXIF Information` button to update.


EXIF works on Craft 2.4.x and Craft 2.5.x.

## Available Data


* **Camera Make** `cameraMake`
* **Camera Model** `cameraModel`
* **Edit Software** `editSoftware`
* **Edit Date** `editDate`
* **Date Taken** `dateTaken`
* **Shutter Speed** `shutterSpeed`
* **Aperture** `aperture`
* **ISO** `iso`
* **Focal Length** `focalLength`
* **Metering Mode** `meteringMode`
* **Light Source** `lightSource`
* **Flash** `flash`
* **Exposure Mode** `exposureMode`
* **White Balance** `whiteBalance`
* **Digital Zoom Ratio** `digitalZoomRatio`
* **Scene Capture Type** `sceneCaptureType`
* **Contrast** `contrast`
* **Saturation** `saturation`
* **Sharpness** `sharpness`
* **Subject Distance Range** `subjectDistanceRange`




## How To Use

In your front-end template you can use EXIF in two ways:


1. `{{ asset.photoExif['cameraMake'] is defined ? 'Camera Make: ' ~ asset.photoExif['cameraMake'] : 'n/a' }}`

2.
```
{% if asset.photoExif['cameraMake'] %}
Camera Make: asset.photoExif['cameraMake']
{% endif %}
```
___

* `asset` is your photo file
* `photoExif` is your field handle name
* `cameraMake` is available data value

___

## Example


```
<section id="exif-demo">
    {# Just getting a random asset file by id for testing #}
    {% set asset = craft.assets.id('19').first() %}

    <img src="{{ asset.getUrl() }}" width="450">
    
    <div class="exif">
      <h1>IFD0 Information</h1>
      <div class="block">
        <p>{{ asset.photoExif['cameraMake'] is defined ? asset.photoExif['cameraMake'] : 'n/a' }}</p>
        <p>{{ asset.photoExif['cameraModel'] is defined ? asset.photoExif['cameraModel'] : 'n/a' }}</p>
        <p>{{ asset.photoExif['editSoftware'] is defined ? asset.photoExif['editSoftware'] : 'n/a' }}</p>
        <p>{{ asset.photoExif['editDate'] is defined ? asset.photoExif['editDate'] : 'n/a' }}</p>
      </div>
    </div>
    
    <div class="ifdo">
      <h1>EXIF Information</h1>
      <div class="block">
        <p>{{ asset.photoExif['shutterSpeed'] is defined ? 'Shutter Speed: ' ~ asset.photoExif['shutterSpeed'] : 'n/a' }}</p>
        <p>{{ asset.photoExif['aperture'] is defined ? 'Aperture: f/' ~ asset.photoExif['aperture'] : 'n/a' }}</p>
        <p>{{ asset.photoExif['iso'] is defined ? 'ISO: ' ~ asset.photoExif['iso'] : 'n/a' }}</p>
        <p>{{ asset.photoExif['dateTaken'] is defined ? 'Date Taken: ' ~ asset.photoExif['dateTaken'] |date('m.d.Y') : 'n/a' }}</p>
        <p>{{ asset.photoExif['meteringMode'] is defined ? 'Metering Mode: ' ~ asset.photoExif['meteringMode'] : 'n/a' }}</p>
        <p>{{ asset.photoExif['lightSource'] is defined ? 'Light Source: ' ~ asset.photoExif['lightSource'] : 'n/a' }}</p>
        <p>{{ asset.photoExif['flash'] is defined ? 'Flash: ' ~ asset.photoExif['flash'] : 'n/a' }}</p>
        <p>{{ asset.photoExif['exposureMode'] is defined ? 'Exposure Mode: ' ~ asset.photoExif['exposureMode'] : 'n/a' }}</p>
        <p>{{ asset.photoExif['whiteBalance'] is defined ? 'White Balance: ' ~ asset.photoExif['whiteBalance'] : 'n/a' }}</p>
        <p>{{ asset.photoExif['digitalZoomRatio'] is defined ? 'Digital Zoom Ration: ' ~ asset.photoExif['digitalZoomRatio'] : 'n/a' }}</p>
        <p>{{ asset.photoExif['sceneCaptureType'] is defined ? 'Scene Capture Type: ' ~ asset.photoExif['sceneCaptureType'] : 'n/a' }}</p>
        <p>{{ asset.photoExif['contrast'] is defined ? 'Contrast: ' ~ asset.photoExif['contrast'] : 'n/a' }}</p>
        <p>{{ asset.photoExif['saturation'] is defined ? 'Saturation: ' ~ asset.photoExif['saturation'] : 'n/a' }}</p>
        <p>{{ asset.photoExif['sharpness'] is defined ? 'Sharpness: ' ~ asset.photoExif['sharpness'] : 'n/a' }}</p>
        <p>{{ asset.photoExif['subjectDistanceRange'] is defined ? 'Subject Distance Range: ' ~ asset.photoExif['subjectDistanceRange'] : 'n/a' }}</p>
      </div>
    </div>
  </section>
```

## EXIF Changelog

### 0.0.1 -- 2016.06.28

* Initial release

Brought to you by [Vadim Goncharov](http://photocollections.io)
