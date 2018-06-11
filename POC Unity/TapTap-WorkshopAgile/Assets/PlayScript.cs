using System;
using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class PlayScript : MonoBehaviour {

    private int count = 0;
    private List<string> monsters = new List<string>() { "monster1", "monster2", "monster3", "monster4" };


    // Use this for initialization
    void Start()
    {
    }
    
    // Update is called once per frame
    void Update()
    {
        if (Input.GetMouseButtonDown(0))
        {
            this.count++;
            if(this.count >= monsters.Count)
            {
                this.count = 0;
            }
        }

        if (count == 3)
            ChangeMonster();
    }

    private void ChangeMonster()
    {
        GameObject.Find("Monster").GetComponent<Image>().sprite = Resources.Load<Sprite>("Monsters/" + monsters[count]);
        Console.WriteLine(monsters[count]);
    }

}
