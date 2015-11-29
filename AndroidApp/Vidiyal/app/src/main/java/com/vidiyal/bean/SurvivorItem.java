package com.vidiyal.bean;

import java.io.Serializable;

/**
 * Created by Rifan on 11/29/2015.
 */
public class SurvivorItem implements Serializable {
    private int client_id;
    private String name, address, phonenumber, enrolled_by, status;

    public int getClient_Id() {
        return client_id;
    }

    public void setClient_Id(int client_Id) {
        this.client_id = client_Id;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getAddress() {
        return address;
    }

    public void setAddress(String address) {
        this.address = address;
    }

    public String getPhonenumber() {
        return phonenumber;
    }

    public void setPhonenumber(String phonenumber) {
        this.phonenumber = phonenumber;
    }

    public String getEnrolled_by() {
        return enrolled_by;
    }

    public void setEnrolled_by(String enrolled_by) {
        this.enrolled_by = enrolled_by;
    }

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }
}
