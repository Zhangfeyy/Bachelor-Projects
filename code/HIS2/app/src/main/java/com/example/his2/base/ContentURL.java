package com.example.his2.base;


public class ContentURL {
    /**
     * 获取指定日期对应的历史上的今天的网址
     * @param data 日期,格式:月/日 如:1/1,/10/1,12/12 如月或者日小于10,前面无需加0
     */
    public static String getTodayHistoryURL(String data) {
        String url = "http://v.juhe.cn/todayOnhistory/queryEvent.php?date=" + data +
                "&key=dc0be1f476d191405e3377fc26595cb2";
        return url;
    }

    /**
     * 获取指定日期老黄历网址
     * @param data 日期，格式2014-09-09
     */
    public static String getLaoHuangLiURL(String data) {
        String url = "http://v.juhe.cn/laohuangli/d?date=" + data +
                "&key=6dea892b8e9e5dcf10e3608164111eab";
        return url;
    }

    /**
     * 根据指定事件id获取指定事件详情信息
     * @param uid 	事件id
     */
    public static String getHistoryDetail(String uid) {
        String url = "http://v.juhe.cn/todayOnhistory/queryDetail.php?" +
                "key=dc0be1f476d191405e3377fc26595cb2&e_id=" + uid;
        return url;
    }
}
