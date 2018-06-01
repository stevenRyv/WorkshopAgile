using System;
using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class PlayScript : MonoBehaviour {


    //Make sure to attach these Buttons in the Inspector
    public Button m_YourButton, m_YourSecondButton;

    // Use this for initialization
    void Start()
    {
        Button btn = m_YourButton.GetComponent<Button>();
        Button btn2 = m_YourSecondButton.GetComponent<Button>();
        //Calls the TaskOnClick method when you click the Button
        btn.onClick.AddListener(TaskOnClick);

        m_YourSecondButton.onClick.AddListener(delegate { TaskWithParameters("Hello"); });
    }

    private void TaskOnClick()
    {
        Debug.Log("You have clicked the button!");
    }

    // Update is called once per frame
    void Update () {
		
	}

}
