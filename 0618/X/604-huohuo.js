{
  "ua": "",
  "homeUrl": "https://www.huohuo99.com/",
  //"dcVipFlag": "true",
  //"pCfgJs": "/static/js/playerconfig.js",
  //"pCfgJsR": "[\\W|\\S|.]*?MacPlayerConfig.player_list[\\W|\\S|.]*?=([\\W|\\S|.]*?),MacPlayerConfig.downer_list",
  //"dcShow2Vip": {},
  //"dcPlayUrl": "true",
  "cateManual": {
    "电影": "1",
    "电视剧": "2",
    "动漫": "4",
    "综艺": "3",
    "纪录片": "5"
  },
  "homeVodNode": "//ul[contains(@class, 'hl-vod-list clearfix')]/li",
  "homeVodName": "/a/@title",
  "homeVodId": "/a/@href",
  "homeVodIdR": "/voddetail/(\\S+).html",
  "homeVodImg": "/a/@data-original",
  "homeVodMark": "",
  "cateUrl": "https://www.huohuo99.com/vodshow/{cateId}--------{catePg}---.html",
  "cateVodNode": "//ul[contains(@class, 'hl-vod-list clearfix')]/li",
  "cateVodName": "/a/@title",
  "cateVodId": "/a/@href",
  "cateVodIdR": "/voddetail/(\\S+).html",
  "cateVodImg": "/a/@data-original",
  "cateVodMark": "",
  "dtUrl": "https://www.huohuo99.com/voddetail/{vid}.html",
  "dtNode": "//div[contains(@class,'hl-detail-content hl-marg-right50 clearfix')]/div[1]",
  "dtName": "/span/@title",
  "dtImg": "/span/@data-original",
  "dtFromNode": "//div[contains(@class,'hl-plays-from hl-tabs swiper-wrapper clearfix')]",
  "dtFromName": "//a[@href='javascript:void(0);' and contains(@class, 'hl-tabs-btn hl-slide-swiper')]/@alt",
  "dtUrlNode": "//ul[contains(@class,'hl-plays-list hl-sort-list')]",
  "dtUrlSubNode": "/li/a",
  "dtUrlId": "/@href",
  "dtUrlIdR": "/vodplay/(\\S+).html",
  "dtUrlName": "/text()",
  "playUrl": "https://www.huohuo99.com/vodplay/{playUrl}.html",
  "searchUrl": "/index.php/ajax/suggest?mid=1&wd={wd}",
  "scVodNode": "json:list",
  "scVodName": "name",
  "scVodId": "id",
  "scVodIdR": "",
  "scVodImg": "pic",
  "scVodMark": ""
}