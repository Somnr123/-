{
 //"ua": "Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1",
    "ua": "",
 "homeUrl": "https://nulltm.com/",
 "cateManual": {"电影":"1","电视剧":"2","综艺":"3","动漫":"4"},
 "homeVodNode": "//a[@class='stui-vodlist__thumb lazyload']",
 "homeVodName": "/@title",
 "homeVodId": "/@href",
 "homeVodIdR": "/voddetail/(\\w+).html",
 "homeVodImg": "/@data-original",
 "homeVodImgR": "",
 "homeVodMark": "/span[2]/text()",
 "cateUrl": "https://nulltm.com/vodtype/{cateId}-{catePg}.html",
 "cateVodNode": "//a[@class='stui-vodlist__thumb lazyload']",
 "cateVodName": "/@title",
 "cateVodId": "/@href",
 "cateVodIdR": "/voddetail/(\\w+).html",
 "cateVodImg": "/@data-original",
 "cateVodImgR": "",
 "cateVodMark": "/span[2]/text()",
 "dtUrl": "https://nulltm.com/voddetail/{vid}.html",
 "dtNode": "//body",
 "dtName": "//h2[@class='title']/text()",
 "dtNameR": "",
 "dtImg": "//div[@class='stui-content__thumb']/a/img/@data-original",
 "dtImgR": "",
 "dtCate": "//div[@class='stui-content__detail']/p[1]/text()",
 "dtCateR": "类型：(.*)",
 "dtYear": "/div[@class='cf b-t1']/div[2]/div[2]/a[not(@title)]/text()",
 "dtYearR": "",
 "dtArea": "",
 "dtAreaR": "",
 "dtMark": "",
 "dtMarkR": "",
 "dtActor": "//div[@class='stui-content__detail']/p[2]/text()",
 "dtActorR": "主演：(.*)",
 "dtDirector": "//div[@class='stui-content__detail']/p[3]/text()",
 "dtDirectorR": "导演：(.*)",
 "dtDesc": "//span[@class='detail-content']/text()",
 "dtDescR": "",
 "dtFromNode": "//h3[@class='iconfont icon-iconfontplay2']",
 "dtFromName": "/text()",
 "dtFromNameR": "",
 "dtUrlNode": "//ul[@class='stui-content__playlist clearfix']",
 "dtUrlSubNode": "/li/a",
 "dtUrlId": "/@href",
 "dtUrlIdR": "/(\\S+).html",
 "dtUrlName": "/text()",
 "dtUrlNameR": "",
 "playUrl": "https://nulltm.com/{playUrl}.html",
 "playUa": "",
 "searchUrl": "https://nulltm.com/vodsearch/{wd}-------------.html",
 "scVodNode": "//a[@class='stui-vodlist__thumb lazyload']",
 "scVodName": "/@title",
 "scVodId": "/@href",
 "scVodIdR": "/voddetail/(\\w+).html",
 "scVodImg": "/@data-original",
 "scVodMark": "/span[2]/text()"
}